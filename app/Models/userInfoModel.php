<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class userInfoModel extends Model
{
    use SoftDeletes;
    protected $table = 'userInfo';
    protected $fillable = [
    	'uid',
		'setting',
		'value'
    ];
}
