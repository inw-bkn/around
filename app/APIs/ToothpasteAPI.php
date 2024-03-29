<?php

namespace App\APIs;

use App\Contracts\AuthenticationAPI;
use App\Contracts\PatientAPI;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ToothpasteAPI implements PatientAPI, AuthenticationAPI
{
    public function authenticate($login, $password)
    {
        $password = str_replace('+', 'BuAgSiGn', $password);
        $password = str_replace('%', 'PeRcEnTsIgN', $password);
        $password = str_replace('&', 'LaEsIgN', $password);
        $password = str_replace('=', 'TaOkUbSiGn', $password);

        $data = $this->brushing($this->pasteLoad('authenticate', ['login' => $login, 'password' => $password]));
        if (! $data || ! $data['ok']) { // error: $data = null
            return [
                'found' => false,
                'message' => ($data['status'] ?? 500) === 400 ? __('auth.failed') : __('service.failed'),
            ];
        }

        if (! isset($data['found']) || ! $data['found']) {
            $data['message'] = $data['message'] ?? __('auth.failed');
            unset($data['UserInfo']);
            unset($data['body']);

            return $data;
        }

        return [
            'ok' => $data['ok'],
            'found' => $data['found'],
            'username' => $data['login'],
            'name' => $data['full_name'],
            'name_en' => $data['full_name_en'],
            'email' => $data['email'],
            'org_id' => $data['org_id'],
            'tel_no' => $data['tel_no'] ?? null,
            'document_id' => null,
            'org_division_name' => $data['division_name'],
            'org_position_title' => $data['position_name'],
            'remark' => $data['remark'],
            'password_expires_in_days' => $data['password_expires_in_days'],
        ];
    }

    public function getUserById($id)
    {
        $data = $this->brushing($this->pasteLoad('user_by_id', ['org_id' => $id]));
        if (! $data || ! $data['ok']) { // error: $data = null
            return [
                'found' => false,
                'message' => __('service.failed'),
            ];
        }

        if (! isset($data['found']) || ! $data['found']) {
            $data['message'] = $data['message'] ?? __('auth.failed');
            unset($data['UserInfo']);
            unset($data['body']);

            return $data;
        }

        return $data;
    }

    public function getPatient($hn)
    {
        $data = $this->brushing($this->pasteLoad('patient', ['hn' => $hn]));
        if (! $data || ! $data['ok']) { // error: $data = null
            return [
                'found' => false,
                'message' => __('service.failed'),
            ];
        }

        if (! isset($data['found']) || ! $data['found']) {
            $data['message'] = __('service.item_not_found', ['item' => 'HN']);
            unset($data['body']);

            return $data;
        }

        return $data;
    }

    public function getAdmission($an)
    {
        $data = $this->brushing($this->pasteLoad('admission', ['an' => $an]));
        if (! $data || ! $data['ok']) { // error: $data = null
            return [
                'found' => false,
                'message' => __('service.failed'),
            ];
        }

        if (! isset($data['found']) || ! $data['found']) {
            $data['message'] = __('service.item_not_found', ['item' => 'AN']);
            unset($data['body']);

            return $data;
        }

        $data['patient']['found'] = true;
        $data['attending_name'] = $data['attending'];
        $data['discharge_type_name'] = $data['discharge_type'];
        $data['discharge_status_name'] = $data['discharge_status'];
        $data['encountered_at'] = $data['admitted_at'] ? Carbon::parse($data['admitted_at'], 'asia/bangkok')->tz('UTC') : null;
        $data['dismissed_at'] = $data['discharged_at'] ? Carbon::parse($data['discharged_at'], 'asia/bangkok')->tz('UTC') : null;
        $data['patient']['marital_status_name'] = $data['patient']['marital_status'];
        $data['patient']['location'] = $data['patient']['postcode'];

        return $data;
    }

    public function recentlyAdmission($hn)
    {
        $data = $this->brushing($this->pasteLoad('recently_admit', ['hn' => $hn]));
        if (! $data || ! $data['ok']) { // error: $data = null
            return [
                'found' => false,
                'message' => __('service.failed'),
            ];
        }

        if (isset($data['found']) && $data['found']) { // error: not found found
            $data['patient']['found'] = true;
            $data['attending_name'] = $data['attending'];
            $data['discharge_type_name'] = $data['discharge_type'];
            $data['discharge_status_name'] = $data['discharge_status'];
            $data['encountered_at'] = $data['admitted_at'] ? Carbon::parse($data['admitted_at'], 'asia/bangkok')->tz('UTC') : null;
            $data['dismissed_at'] = $data['discharged_at'] ? Carbon::parse($data['discharged_at'], 'asia/bangkok')->tz('UTC') : null;
            $data['patient']['marital_status_name'] = $data['patient']['marital_status'];
            $data['patient']['location'] = $data['patient']['postcode'];

            return $data;
        }

        $data['message'] = __('service.item_not_found', ['item' => 'admission']);
        if (isset($data['patient']) && $data['patient']['found']) { // error not found patient
            $data['patient']['marital_status_name'] = $data['patient']['marital_status'];
            $data['patient']['location'] = $data['patient']['postcode'];

            return $data;
        }

        $data['patient']['message'] = __('service.item_not_found', ['item' => 'HN']);

        return $data;
    }

    protected function brushing($data)
    {
        try {
            $response = Http::timeout(2)
                        ->withOptions(['verify' => false])
                        ->retry(5, 100, fn ($exception) => $exception instanceof ConnectionException)
                        ->asForm()
                        ->post(config('services.toothpaste.url'), ['payload' => $data]);
        } catch (Exception $e) {
            $errorsInAWhile = Cache::remember('connection-errors-in-a-while', 60, fn () => 0) + 1;
            Cache::increment('connection-errors-in-a-while');
            if ($errorsInAWhile > 3) {
                Log::error('toothpaste '.$e->getMessage());
            }

            return ['ok' => false];
        }

        return $response->json();
    }

    protected function pasteLoad($service, $data)
    {
        $config = config('services.toothpaste')[$service];
        $data = [
            'endpoint' => $config['endpoint'],
            'data' => $data,
            'callgate_token' => config('services.toothpaste.token'),
            'callgate_appname' => 'mocktail',
        ];

        if ($config['auth'] === 'token_secret') {
            $data['api_app'] = $config['app'];
            $data['api_token'] = $config['token'];
        } else {
            $data['bearer'] = $config['bearer'];
        }

        return json_encode($data);
    }
}
