<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo_Projects extends Model
{
	use SoftDeletes;
    protected $table = 'Todo_Projects';
    protected $fillable = [ 'Name', 'Description' ];
}
