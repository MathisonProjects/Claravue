<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\blogModel;


class blogController extends Controller
{
    public function getAll() {
        return blogModel::get();
    }

    public function saveRecord(Request $request) {
		$data = $request->input();

        if (isset($data['id'])) {
            $item = blogModel::find($data['id']);
        } else {
    		$item = new blogModel;
        }
        $item->pid = $data['pid'];
        $item->description = $data['description'];
        $item->save();
    }

    public function deleteRecord(Request $request) {
		blogModel::destroy($request->input('id'));
    }
}
