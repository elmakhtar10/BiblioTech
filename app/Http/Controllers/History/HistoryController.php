<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class HistoryController extends Controller
{
    public function index(){
        return view('history.index');
    }
}
