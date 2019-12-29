<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class interestCheckModel extends Model
{
    use SoftDeletes;
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
