<?php

namespace App\Http\Controllers\Authors;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        return view('authors.author');
    }

    public function getAuthors(Request $request){
        $perPages = $request->
        $authors = Author::paginate(10);
        return view('authors.author', compact('authors', 'perPages'));
    }
}
