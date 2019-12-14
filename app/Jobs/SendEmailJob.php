<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public function __construct($args) {
        $this->data = $args;
    }

    public function handle() {
        $data = $this->data;
        // reason, subject, email, phone_number, name, message, to
        Mail::send('email.'.$data['form'], ['data' => $data], function($message) use ($data) {
            $message->from(env('MAIL_USERNAME'), $data['name']);
            $message->to($data['email'], $data['name']);
            $message->subject($data['subject']);
        });
    }
}
