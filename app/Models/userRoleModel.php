<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userRoleModel extends Model
{
    protected $table = 'userRole';
    protected $fillable = [
    	'name'
    ];
}
