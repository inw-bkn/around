<?php

namespace App\Http\Controllers\Procedures\AcuteHemodialysis;

use App\Http\Controllers\Controller;
use App\Managers\Procedures\AcuteHemodialysis\CaseRecordManager;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class CaseRecordsController extends Controller
{
    protected $manager;

    public function __construct()
    {
        $this->manager = new CaseRecordManager();
    }

    public function index()
    {
        $data = $this->manager->getIndexData(Request::all());
        // if want JSON then return data

        $this->manager->setFlash($data['flash']);

        return Inertia::render('Procedures/AcuteHemodialysis/Index', [
            'cases' => $data['cases'],
            'filters' => [
                'search' => '',
                'scope' => 'all',
            ],
        ]);
    }

    public function store()
    {
        $caseRecord = $this->manager->store(Request::all());

        return Redirect::route('procedures.acute-hemodialysis.edit', $caseRecord->slug);
    }

    public function edit($slug)
    {
        $data = $this->manager->getEditData($slug);
        // if want JSON then return data

        $this->manager->setFlash($data['flash']);

        return Inertia::render('Procedures/AcuteHemodialysis/Edit', [
            'caseRecordForm' => $data['caseRecordForm'],
            'orders' => $data['orders'],
            'formConfigs' => $data['formConfigs'],
        ]);
    }

    public function update($slug)
    {
        return $this->manager->update($slug, Request::all());
    }
}
