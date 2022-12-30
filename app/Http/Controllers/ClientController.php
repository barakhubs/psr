<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index (){
        $clients = Client::get();
        return view('clients.index', compact('clients'));
    }

    public function create(){
        return view('clients.update');
    }

    public function appointments (){
        $clients = Client::whereDate('return_visit_date','<=', Carbon::now()->addDays(10))->get();
        return view('clients.appointments', compact('clients'));
    }

    public function sendSms (){
        return view('clients.sms');
    }
}
