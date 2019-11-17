<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\mainMenuModel;

class mainMenuController extends Controller
{
    public function getAll() {
        return mainMenuModel::get();
    }

    public function saveRecord(Request $request) {
		$data = $request->input();

        if ($data['id'] != null) {
            $item = mainMenuModel::find($data['id']);
        } else {
    		$item = new mainMenuModel;
        }

        // $item->key = $data['key'];
        $item->save();
    }

    public function deleteRecord(Request $request) {
		mainMenuModel::destroy($request->input('id'));
    }
}
