<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Implementation\Email;

class processCheckout implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $emailData = [];
    public function __construct(Array $data) {
        $this->emailData = [
            'form'    => 'orderProcessed',
            'email'   => $data['billing']['email'],
            'name'    => $data['billing']['first'].' '.$data['billing']['last'],
            'subject' => 'Your Order Has Been Processed',
            'data'    => $data
        ];

    }

    public function handle() {
        $email = new Email($this->emailData);
        $email->sendEmail();
        $this->emailData['email']   = env('MAIL_USERNAME');
        $this->emailData['name']    = env('MAIL_NAME');
        $this->emailData['subject'] = 'You Have Received An Order';
        $adminEmail = new Email($this->emailData);
        $adminEmail->sendEmail();
    }
}
