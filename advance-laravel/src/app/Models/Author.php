<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;


    protected $fillable = ['name','age','nationality'];

    public function book(){
        return $this->hasMany('App\Models\Book');
    }

    public function getDetail()
    {
        return 'ID'.$this->id.':'.$this->name.'('.$this->age.'才)';
    }

   
}
