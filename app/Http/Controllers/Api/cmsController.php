<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cms_modules;
use App\Models\cms_records;

class cmsController extends Controller
{
    public function getModules(Request $request) {
    	$modules = cms_modules::get();
        foreach ($modules as $key => $module) {
            $modules[$key]->fields = json_decode($module->fields, true);
        }
        return $modules;
    }
    
    public function getRecords(Request $request) {
        $records = cms_records::get();
        foreach ($records as $key => $record) {
            $records[$key]->data = json_decode($record->data, true);
        }
    	return $records;
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
