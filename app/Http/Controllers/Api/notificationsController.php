<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\notificationsModel;

class notificationsController extends Controller
{
    public function getAll() {
        return notificationsModel::get();
    }

    public function getAllGeneral() {
    	return notificationsModel::where('uid', 0)->get();
    }

    public function getAllUser(Request $request) {
		$data = $request->input();
    	return notificationsModel::where('uid', $data['uid'])->get();
    }

    public function setRead(Request $request) {
		$data = $request->input();
		
    }

    public function saveRecord(Request $request) {
		$data = $request->input();

        if (isset($data['id'])) {
            $item = notificationsModel::find($data['id']);
        } else {
    		$item = new notificationsModel;
        }
        $item->uid = $data['uid'];
		$item->icon = $data['icon'];
		$item->header = $data['header'];
		$item->content = $data['content'];
		$item->hasRead = $data['hasRead'];
		$item->expiration = $data['expiration'];
        $item->save();
    }

    public function deleteRecord(Request $request) {
		notificationsModel::destroy($request->input('id'));
    }
}
