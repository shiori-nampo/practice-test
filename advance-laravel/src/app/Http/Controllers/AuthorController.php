<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all();
        return view('index',['authors' => $authors]);
    }

    public function add()
    {
        return view('add');
    }

    public function create(AuthorRequest $request)
    {
        $form = $request->all();
        Author::create($form);
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $author = Author::find($request->id);
        return view('edit',['form' => $author]);
    }

    public function update(AuthorRequest $request)
    {
        $form = $request->all();
        unset($form['_token']); //laravelから自動で送られてくるCSRFトークンを削除している
        Author::find($request->id)->update($form);
        // 該当する作者データを更新する
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        if(!$author) {
            return redirect('/')->with('message','著者が見つかりませんでした。');
        }
        return view('delete',['author' => $author]);
    }

    public function remove(Request $request)
    {
        Author::find($request->id)->delete();
        return redirect('/');
    }

    public function find()
    {
        return view('find',['input' => '']);
    }
    public function search(Request $request)
    {
        $item = Author::where('name','LIKE',"%{$request->input}%")->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find',$param);
    }

    public function bind(Author $author)
    { //bind＝結びつける
        $data = [
            'item' => $author,
        ];
        return view('author.binds',$data);
    }

    public function verror()
    {
        return view('verror');
    }

}


