<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class settingsModel extends Model
{
    protected $table = 'settings';
    protected $fillable = [
    	'key',
		'value'
    ];
}
