<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        $form = $request->all();
        Author::create($form);
        return redirect('/');
    }

     public function index()
    {
        $authors = Author::all();
        return view('index',['authors' => $authors]);
    }

}


