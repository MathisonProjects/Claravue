<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\mainMenuModel;

class mainMenuController extends Controller
{
    public function getAll() {
        return mainMenuModel::orderBy('oid', 'ASC')->get();
    }

    public function saveRecord(Request $request) {
		$data = $request->input();

        if (isset($data['id'])) {
            $item = mainMenuModel::find($data['id']);
        } else {
    		$item = new mainMenuModel;
        }

        // $item->key = $data['key'];
        $item->icon = $data['icon'];
        $item->text = $data['text'];
        $item->type = $data['type'];
        $item->target = $data['target'];
        $item->oid = $data['oid'];
        $item->save();
    }

    public function deleteRecord(Request $request) {
		mainMenuModel::destroy($request->input('id'));
    }
}
