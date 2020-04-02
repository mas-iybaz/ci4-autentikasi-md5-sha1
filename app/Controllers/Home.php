<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (!$this->session->has('nim')) {
			return redirect('auth');
		} else {
			return view('welcome_message');
		}
	}
}
