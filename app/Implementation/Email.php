<?php
namespace App\Implementation;

use App\Interfaces\IEmail;
use Illuminate\Support\Facades\Mail;

class Email implements IEmail {
	protected $form;
	protected $email;
	protected $name;
	protected $subject;
	protected $data;

	public function __construct($data = null) {
		if ($data != null) {
			$this->form = $data['form'];
			$this->email = $data['email'];
			$this->name = $data['name'];
			$this->subject = $data['subject'];
			$this->data = $data['data'];
		}
	}

	public function setForm($value) {
		$this->form = $value;
		return $this;
	}
	public function setEmail($value) {
		$this->email = $value;
		return $this;
	}
	public function setName($value) {
		$this->name = $value;
		return $this;
	}
	public function setSubject($value) {
		$this->subject = $value;
		return $this;
	}
	public function setData($value) {
		$this->data = $value;
		return $this;
	}
	public function sendEmail() {
		$data = [
			'email' => $this->email,
			'name' => $this->name,
			'subject' => $this->subject
		];
		Mail::send('email.'.$this->form, ['data' => $this->data], function($message) use ($data) {
            $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
            $message->to($data['email'], $data['name']);
            $message->subject($data['subject']);
        });
	}
}