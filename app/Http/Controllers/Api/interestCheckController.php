<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\interestCheckModel;

class interestCheckController extends Controller
{
	public function getAll() {
        return interestCheckModel::get();
    }

    public function saveRecord(Request $request) {
		$data = $request->input();

        if (isset($data['id'])) {
            $item = interestCheckModel::find($data['id']);
        } else {
    		$item = new interestCheckModel;
        }
        $item->data = $data['data'];
        $item->save();
    }

    public function deleteRecord(Request $request) {
		interestCheckModel::destroy($request->input('id'));
    }
}
