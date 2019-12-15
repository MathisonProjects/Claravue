<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo_Categories extends Model
{
    protected $table = 'Todo_Categories';
    protected $fillable = [ 'ProjectId', 'Name', 'Description' ];
    
}
