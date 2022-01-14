<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Product extends Model
{
    use Sluggable;

    public $timestamps = true;
    protected $table = "products";
    protected $guarded = ['id']; 

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
