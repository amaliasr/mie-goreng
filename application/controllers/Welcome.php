<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use MobaGuides\MobileLegendsApi\MobileLegends;
use MobaGuides\MobileLegendsApi\Fetchers\Hero;
use MobaGuides\MobileLegendsApi\Fetchers\Image;
use setasign\Fpdi\Fpdi;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Welcome extends CI_Controller {

	public function index()
	{
		$hero = MobileLegends::make(Hero::class);
		$image = MobileLegends::make(Image::class);
		print_r($hero->all());
		// $this->load->view('welcome_message', $data);
	}
	public function cek()
	{
		# code...
	}
}
