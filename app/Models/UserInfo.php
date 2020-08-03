<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_info';
    protected $fillable = [
       ' user_id',
        'age',
        'image',
        'birthday',
        'email',
        'sex',
        'identity_type',
        'identity_no',
        'user_description',
        'level_id',
        'deleted_at',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
