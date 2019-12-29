<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class blogModel extends Model
{
	use SoftDeletes;
    protected $table = 'siteBlog';
    protected $fillable = [
    	'pid',
    	'description'
    ];
}
