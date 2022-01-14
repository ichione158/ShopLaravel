<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = true;
    protected $table = "posts";
    protected $guarded = ['id']; 

    public function postCategory()
    {
        return $this->hasMany(Cart::class);
    }
}
