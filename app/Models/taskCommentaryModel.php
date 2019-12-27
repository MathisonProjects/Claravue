<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskCommentaryModel extends Model
{
    protected $table = 'taskCommentary';
    protected $fillable = [
    	'uid',
		'tid',
		'tcid',
		'comment'
    ];
}
