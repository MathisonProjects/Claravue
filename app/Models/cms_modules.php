<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cms_modules extends Model
{
    use SoftDeletes;
    protected $table = 'cms_modules';
    protected $fillable = [
    	'name',
		'description',
		'fields'
    ];
}
