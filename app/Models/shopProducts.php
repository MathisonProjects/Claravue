<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class shopProducts extends Model
{
    use SoftDeletes;
    protected $table = 'shopProducts';
    protected $fillable = [
		'sku',
		'categories',
		'name',
		'short_description',
		'long_description',
		'amount',
		'meta'
    ];
}
