<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class apisListModel extends Model
{
    use SoftDeletes;
    protected $table = 'apisList';
    protected $fillable = [
    	'name',
		'description',
		'endpoint',
		'header',
		'payload'
    ];
}
