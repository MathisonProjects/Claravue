<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cms_records extends Model
{
    use SoftDeletes;
    protected $table = 'cms_records';
    protected $fillable = [
    	'mid',
		'data'
    ];
}