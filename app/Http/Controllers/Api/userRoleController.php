<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\userRoleModel;

class userRoleController extends Controller
{
	public function getAll() {
        return userRoleModel::get();
    }

    public function saveRecord(Request $request) {
		$data = $request->input();

        if (isset($data['id'])) {
            $item = userRoleModel::find($data['id']);
        } else {
    		$item = new userRoleModel;
        }
        $item->name = $data['name'];
        $item->save();
    }

    public function deleteRecord(Request $request) {
		userRoleModel::destroy($request->input('id'));
    }
}
