<?php

namespace App\Http\Controllers\Procedures\AcuteHemodialysis;

use App\Http\Controllers\Controller;
use App\Managers\Procedures\AcuteHemodialysis\OrderManager;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class OrdersController extends Controller
{
    protected $manager;

    public function __construct()
    {
        $this->manager = new OrderManager();
    }

    public function store()
    {
        $note = $this->manager->store(Request::all());

        return Redirect::route('procedures.acute-hemodialysis.orders.edit', $note->slug);
    }

    public function edit($slug)
    {
        $data = $this->manager->getEditData($slug);
        // if want JSON then return data

        $this->manager->setFlash($data['flash']);

        return Inertia::render('Procedures/AcuteHemodialysis/Order/Edit', [
            'orderForm' => $data['orderForm'],
            'formConfigs' => $data['formConfigs'],
        ]);
    }

    public function update($slug)
    {
        return $this->manager->update($slug, Request::all());
    }
}
