<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mainMenuModel extends Model
{
    protected $table = 'mainMenu';
    protected $fillable = [ 'icon', 'text', 'type', 'target', 'oid' ];
}
