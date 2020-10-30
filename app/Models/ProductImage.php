<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductImage extends Model
{
    protected $connection = 'mysql_products';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function setImageUrlAttribute($pictures)
    {
        if(is_array($pictures)) {
            $this->attributes['image_url'] = json_encode($pictures);
        }
    }

    public function getImageUrlAttribute($pictures)
    {
       return json_decode($pictures,true);
    }
}
