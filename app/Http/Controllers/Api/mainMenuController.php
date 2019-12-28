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
        if ($item->oid != $data['oid'] && $item->id != null) {
            $this->oidChange($item, $data);
        }
        $item->oid = $data['oid'];
        $item->save();

        $this->cleanOids();
    }

    public function deleteRecord(Request $request) {
		mainMenuModel::destroy($request->input('id'));
        $this->cleanOids();
    }

    private function oidChange(mainMenuModel $item, $data) {
        $oldItemOid = mainMenuModel::where('oid', $data['oid'])->first();
        if (isset($oldItemOid->id) && $oldItemOid->id != null) {
            if ($item->oid < $data['oid']) { 
                $oldItemOid->oid -= 1;
            } else if ($item->oid > $data['oid']) {
                $oldItemOid->oid += 1;
            }
            $oldItemOid->save();
        }
    }

    private function cleanOids() {
        $menu = mainMenuModel::get();
        $menuLength = count($menu) - 1;

        foreach ($menu as $key => $item) {
            if ($item->oid > $menuLength) {
                $item->oid = $menuLength;
                $item->save();
            }
        }
    }
}
