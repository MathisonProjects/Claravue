<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Implementation\Email;
use App\User;

class TaskNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public function __construct(Email $email) {
        $this->email = $email;
    }

    public function handle()
    {
        $admins = User::getAdmins();
        foreach ($admins as $key => $admin) {
            $this->email->setEmail($admin->email)->setName($admin->name)->sendEmail();
        }
    }
}
