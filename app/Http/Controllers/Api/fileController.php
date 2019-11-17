<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;


class fileController extends Controller
{
    public function getAllFiles() {
        return Storage::disk('upload')->allfiles();
    }

    public function addFile(Request $request) {
		$request->file('file')->store('public/upload');
    }
}
