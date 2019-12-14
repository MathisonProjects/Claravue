<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\settingsModel;

class settingsController extends Controller
{
    public function allSettings() {
    	$data = settingsModel::get();
    	$array = [];
    	foreach ($data as $key => $item) {
    		$array[$item->key] = $item->value;
    	}
    	return $array;
    }

    public function saveSettings(Request $request) {
    	$data = $request->input();

    	foreach ($data as $key => $item) {
    		$setting = [
    			'key'   => $key,
    			'value' => $item
    		];
    		$this->saveSetting($setting);
    	}
    }

    private function saveSetting($data) {
    	$setting = settingsModel::where('key', $data['key'])->first();
    	if ($setting == '') {
    		$setting = new settingsModel;
    	}

    	$setting->key = $data['key'];
    	$setting->value = $data['value'];
    	$setting->save();
    }
}
