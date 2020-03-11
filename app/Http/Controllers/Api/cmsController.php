<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cms_modules;
use App\Models\cms_records;

class cmsController extends Controller
{
    public function getModules(Request $request) {
    	return cms_modules::get();
    }
    
    public function getRecords(Request $request) {
    	return cms_records::get();
    }
    
    public function saveModule(Request $request) {
    	$data = $request->input();

        if (isset($data['id'])) {
            $item = cms_modules::find($data['id']);
        } else {
            $item = new cms_modules;
        }
        $item->name        = $data['name'];
        $item->description = $data['description'];
        $item->fields      = $data['fields'];
        $item->save();
    }
    
    public function saveRecord(Request $request) {
    	$data = $request->input();

        if (isset($data['id'])) {
            $item = cms_records::find($data['id']);
        } else {
            $item = new cms_records;
        }
        $item->mid  = $data['mid'];
        $item->data = $data['data'];
        $item->save();
    }
    

    public function deleteModule(Request $request) {
    	$modelToDelete = cms_modules::find($request->input('id'));
        $modelToDelete->delete();
    }

    public function deleteRecord(Request $request) {
    	$modelToDelete = cms_records::find($request->input('id'));
        $modelToDelete->delete();
    }
}
