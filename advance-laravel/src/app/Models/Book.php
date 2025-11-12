<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BookController;

class Book extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    // ↑IDを勝手に書き換えられないようにのセキュリティ設定
    public static $rules = array(
        'author_id' => 'required',
        'title' => 'required',
        //バリデーションルールをモデルに定義。この二つは必須項目と。
    );

    public function getTitle(){
        return 'ID'.$this->id .':'.$this->title . '著者:' . optional($this->author)->name;
        //1：タイトル と表示される
    }

    public function author(){
        return $this->belongsTo('App\Models\Author');
    }
}
