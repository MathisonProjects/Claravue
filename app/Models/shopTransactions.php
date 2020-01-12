<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class shopTransactions extends Model
{
    use SoftDeletes;
    protected $table = 'shopTransactions';
    protected $fillable = [];
}
