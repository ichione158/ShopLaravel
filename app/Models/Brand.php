<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = true;
    protected $table = "brands";
    protected $guarded = ['id']; 

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
