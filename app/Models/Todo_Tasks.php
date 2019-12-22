<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo_Tasks extends Model
{
	use SoftDeletes;
    protected $table = 'Todo_Tasks';
    protected $fillable = [ 'CategoryId', 'Name', 'Description', 'SubtaskOf', 'Status', 'archived_at', 'order', 'priority' ];
}
