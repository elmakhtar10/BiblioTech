<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatistiquesController extends Controller
{
    public function index()
    {
        return view('reservations.statistiques');
    }
}
