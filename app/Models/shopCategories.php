<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class shopCategories extends Model
{
    use SoftDeletes;
    protected $table = 'shopCategories';
    protected $fillable = [
    	'name'
    ];
}
