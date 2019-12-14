<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userInfoModel extends Model
{
    protected $table = 'userInfo';
    protected $fillable = [
    	'uid',
		'setting',
		'value'
    ];
}
