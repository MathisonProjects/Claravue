<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class settingsModel extends Model
{
	use SoftDeletes;
    protected $table = 'settings';
    protected $fillable = [
    	'key',
		'value'
    ];
}
