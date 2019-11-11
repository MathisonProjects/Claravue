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

    public function savePage() {

    	$page = pageManagementModel::where('key', $data['key'])->first();
    	if ($page == '') {
    		$page = new pageManagementModel;
    	}

    	$page->key = $data['key'];
    	$page->value = $data['value'];
    	$page->save();
    }
}
