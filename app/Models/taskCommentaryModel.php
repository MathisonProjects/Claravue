<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class taskCommentaryModel extends Model
{
	use SoftDeletes;
    protected $table = 'taskCommentary';
    protected $fillable = [
    	'uid',
		'tid',
		'tcid',
		'comment'
    ];
}
