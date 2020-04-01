<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	// Validation for Login
	public $login = [];

	public $login_errors = [];

	// Validation for Register
	public $register = [
		'fullname' => 'required|alpha_space',
		'nim' => 'required|numeric|is_unique[users.nim]',
		'email' => 'required|valid_email|is_unique[users.email]',
		'password' => 'required|min_length[8]',
		'confirm_password' => 'required|matches[password]',
		'address' => 'required|string',
		'phone' => 'required|numeric'
	];

	public $register_errors = [];

	// Validation for Forgot Password
	public $forgotPassword = [
		'nim' => 'required|numeric|is_not_unique[users.nim]',
		'email' => 'required|valid_email|is_not_unique[users.email]'
	];

	public $forgotPassword_errors = [];

	// Validation for Reset Password
	public $resetPassword = [
		'password' => 'required|min_length[8]',
		'confirm_password' => 'required|matches[password]',
	];

	public $resetPassword_errors = [];
}
