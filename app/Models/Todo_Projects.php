<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo_Projects extends Model
{
    protected $table = 'Todo_Projects';
    protected $fillable = [ 'Name', 'Description' ];
}
