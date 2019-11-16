<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\pageManagementModel;

class pageManagementController extends Controller
{
    public function allPages() {
    	return pageManagementModel::get();
    }

    public function savePage(Request $request) {
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
}
