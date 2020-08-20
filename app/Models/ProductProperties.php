<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProperties extends Model
{

    #数据库链接
    protected $connection = 'mysql_products';

    #白名单的字段
    protected $fillable = ['name','value'];

    #时间字段禁用
    public $timestamps = false;

    #一对一  跟商品
    public function product()
    {
        return $this->belongsTo(Product::class);
    }



}
