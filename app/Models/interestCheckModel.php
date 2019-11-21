<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class interestCheckModel extends Model
{
    protected $table = 'interestCheck';
    protected $fillable = [
		'data'
    ];

    public static function saveModel($data) {
    	if (['id']) {
    		$this->find($data['id']);
    	}
    	$this->data = $data['data'];
    	$this->save();
    }
}
