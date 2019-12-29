<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class jsonRecordsModel extends Model
{
	use SoftDeletes;
    protected $table = 'jsonRecords';
    protected $fillable = [
		'name',
		'description',
		'data'
    ];
}
