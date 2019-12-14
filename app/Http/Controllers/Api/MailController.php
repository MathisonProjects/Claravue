<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Jobs\SendEmailJob;

class MailController extends Controller
{
    public function sendContact(Request $request) {
    	$data = $request->input();
    	$content = [
	    	'form' => 'contact',
			'email' => env('MAIL_USERNAME'),
			'name' => env('MAIL_USERNAME'),
			'subject' => 'Contact Form',
			'data' => $data
		];
    	SendEmailJob::dispatch($content);
    }
}
