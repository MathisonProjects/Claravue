<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\jsonRecordsModel;

class jsonRecordsController extends Controller
{
    public function getAll() {
    	return jsonRecordsModel::get();
    }

	public function saveRecord(Request $request) {
        $data = $request->input();

        if (isset($data['id']) && $data['id'] != null) {
            $item = jsonRecordsModel::find($data['id']);
        } else {
    		$item = new jsonRecordsModel;
        }

        $item->fill($data);
    	$item->save();
	}

	public function deleteRecord(Request $request) {
        jsonRecordsModel::destroy($request->input('id'));
	}
}
