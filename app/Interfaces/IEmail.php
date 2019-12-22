<?php
namespace App\Interfaces;

interface IEmail {
	public function setForm($value);
	public function setEmail($value);
	public function setName($value);
	public function setSubject($value);
	public function setData($value);
	public function sendEmail();
}