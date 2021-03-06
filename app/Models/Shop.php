<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $connection = 'mysql_products';
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function admin_user()
    {
        return $this->belongsTo(AdminUser::Class);
    }


}
