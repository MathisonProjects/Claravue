<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo_Tasks extends Model
{
    protected $table = 'Todo_Tasks';
    protected $fillable = [ 'CategoryId', 'Name', 'Description', 'SubtaskOf', 'Status' ];
}
