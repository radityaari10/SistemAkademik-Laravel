<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sistem_akademik_email extends Mailable
{
	use Queueable, SerializesModels;

	public function __construct()
	{
			//
	}

	public function build()
	{
		return $this->from('raditya_pengirim@polines.ac.id')
								->view('email')
								->with([
									'nama'=> 'Raditya Ari',
									'institusi'=> 'POLINES',
								]);
	}
}
