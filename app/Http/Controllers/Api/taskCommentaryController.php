<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\taskCommentaryModel;

class taskCommentaryController extends Controller
{
    public function getComments(Request $request) {
    	$data = $request->input();
    	return taskCommentaryModel::where('tid', $data['tid'])->get();
    }

    public function save(Request $request) {
    	$data = $request->input();
    	$item = new taskCommentaryModel;
    	$item->uid     = $data['uid'];
		$item->tid     = $data['tid'];
		$item->tcid    = $data['tcid'];
		$item->comment = $data['comment'];
		$item->save();
    }
}
