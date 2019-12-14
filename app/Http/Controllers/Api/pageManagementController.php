<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\pageManagementModel;

class pageManagementController extends Controller
{
    public function getAll() {
    	return pageManagementModel::get();
    }

    public function saveRecord(Request $request) {
        $data = $request->input();

        if ($data['id'] != null) {
            $page = pageManagementModel::find($data['id']);
        } else {
    		$page = new pageManagementModel;
        }

    	$page->key = $data['key'];
        $page->title = $data['title'];
        $page->type = $data['type'];
        $page->data = $data['data'];
    	$page->save();
    }
    
    public function deleteRecord(Request $request) {
        pageManagementModel::destroy($request->input('id'));
    }
}
