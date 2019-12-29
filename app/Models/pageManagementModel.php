<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pageManagementModel extends Model
{
	use SoftDeletes;
    protected $table = 'pageManagement';
    protected $fillable = [
    	'key',
		'type',
		'title',
		'data'
    ];
}
