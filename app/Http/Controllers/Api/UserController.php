<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function totalUsers() {
    	return User::count();
    }

    public function allUsers() {
    	return $this->getAll();
    }

    public function getAll() {
    	return User::get();
    }
	public function saveRecord() {
		$data = $request->input();

        if (isset($data['id'])) {
            $item = User::find($data['id']);
        } else {
    		$item = new User;
        }

        $item->name = $data['name'];
		$item->email = $data['email'];
		$item->password = $data['password'];
		$item->email_verified_at = $data['email_verified_at'];
		$item->active = $data['active'];
		$item->rid = $data['rid'];
        $item->save();
	}
	public function deleteRecord(Request $request) {
		User::destroy($request->input('id'));
	}
}
