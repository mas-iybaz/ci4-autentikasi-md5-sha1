<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// Jika user tidak memiliki session 'nim' berarti user belum login, arahkan ke Route auth
		if (!$this->session->has('nim')) {
			return redirect('auth');
		} else {
			return view('welcome_message');
		}
	}
}
