<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class notificationsModel extends Model
{
	use SoftDeletes;
    protected $table = 'notifications';
    protected $fillable = [
		'uid',
		'icon',
		'header',
		'content',
		'hasRead',
		'expiration'
    ];
}
