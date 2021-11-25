<?php

namespace App\APIs;

use App\Contracts\AuthenticationAPI;
use App\Contracts\PatientAPI;
use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SubHannahAPI implements PatientAPI, AuthenticationAPI
{
    public function authenticate($login, $password)
    {
        $password = str_replace('+', 'BuAgSiGn', $password);
        $password = str_replace('%', 'PeRcEnTsIgN', $password);
        $password = str_replace('&', 'LaEsIgN', $password);
        $password = str_replace('=', 'TaOkUbSiGn', $password);

        $data = $this->makePost('auth', ['login' => $login, 'password' => $password]);
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
        $data = $this->makePost('user-by-id', ['org_id' => $id]);

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
        $data = $this->makePost('patient', ['hn' => $hn]);
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
        $data = $this->makePost('admission', ['an' => $an]);
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
        $data = $this->makePost('patient-recently-admit', ['hn' => $hn]);
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

    public function wardsSummary($wardName = '')
    {
        $data = $this->makePost('api/wards-summary/'.$wardName, []);

        if (! $data) { // error: $data = null
            return [
                'found' => false,
                'message' => __('service.failed'),
            ];
        }

        return $data;
    }

    public function staysSummary($refId = '')
    {
        $data = $this->makePost('api/stays-summary/'.$refId, []);

        if (! $data) { // error: $data = null
            return [
                'found' => false,
                'message' => __('service.failed'),
            ];
        }

        return $data;
    }

    public function stayNotes($refId)
    {
        $data = $this->makePost('api/stay-notes/'.$refId, []);

        if (! $data) { // error: $data = null
            return [
                'found' => false,
                'message' => __('service.failed'),
            ];
        }

        return $data;
    }

    public function stayRecently($hn)
    {
        $data = $this->makePost('api/stay-recently/'.$hn, []);

        if (! $data) { // error: $data = null
            return [
                'found' => false,
                'message' => __('service.failed'),
            ];
        }

        return $data;
    }

    protected function makePost($url, $data)
    {
        $headers = ['app' => config('services.SUBHANNAH_API_NAME'), 'token' => config('services.SUBHANNAH_API_TOKEN')];
        try {
            $response = Http::timeout(2)
                            ->withHeaders($headers)
                            ->withOptions(['verify' => ! str_contains(config('services.SUBHANNAH_API_URL'), '10.7.')])
                            ->retry(5, 100, fn ($exception) => $exception instanceof ConnectionException)
                            ->post(config('services.SUBHANNAH_API_URL').$url, $data);
        } catch (Exception $e) {
            $errorsInAWhile = Cache::remember('connection-errors-in-a-while', 60, fn () => 0) + 1;
            Cache::increment('connection-errors-in-a-while');
            if ($errorsInAWhile > 3) {
                Log::error($url.'@hannah '.$e->getMessage());
            }

            return ['ok' => false];
        }

        if ($response->successful()) {
            return $response->json();
        }

        return ['ok' => false];
    }
}
