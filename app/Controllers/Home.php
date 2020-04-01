<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		// $session = session();
		// if (!$session->has('nim')) {
		// 	redirect('auth');
		// }
	}

	public function index()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
