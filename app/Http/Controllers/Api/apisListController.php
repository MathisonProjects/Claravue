<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\apisListModel;

class apisListController extends Controller
{
    public function getAll() {
        return apisListModel::get();
    }

    public function saveRecord(Request $request) {
		$data = $request->input();

        if (isset($data['id']) && $data['id'] != null) {
            $item = apisListModel::find($data['id']);
        } else {
    		$item = new apisListModel;
        }

        $item->fill($data);
    	$item->save();
    }

    public function deleteRecord(Request $request) {
		apisListModel::destroy($request->input('id'));
    }
}
