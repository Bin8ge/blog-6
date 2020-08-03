<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mysql_products';

    protected $fillable =[
        'product_core',
        'title',
        'bar_code',
        'category_id',
        'status',
        'audit_status',
        'shop_id',
        'description_id',
        'rating',
        'sold_count',
        'review_count',
        'price',
        'image',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];


    public function sku()
    {
        return $this->hasMany(ProductSku::class);

    }

    public function index()
    {

    }



}
