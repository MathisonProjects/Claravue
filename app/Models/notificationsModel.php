<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notificationsModel extends Model
{
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
