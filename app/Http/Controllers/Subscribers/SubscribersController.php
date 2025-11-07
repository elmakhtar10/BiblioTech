<?php

namespace App\Http\Controllers\Subscribers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    public function index(){
        return view('subscribers.index');
    }
}
