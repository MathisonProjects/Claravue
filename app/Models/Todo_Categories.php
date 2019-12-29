<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo_Categories extends Model
{
	use SoftDeletes;
    protected $table = 'Todo_Categories';
    protected $fillable = [ 'ProjectId', 'Name', 'Description' ];
    
}
