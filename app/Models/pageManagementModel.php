<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pageManagementModel extends Model
{
    protected $table = 'pageManagement';
    protected $fillable = [
    	'key',
		'type',
		'title',
		'data'
    ];
}
