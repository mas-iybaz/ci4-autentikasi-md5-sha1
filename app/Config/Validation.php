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
		'confirm_password' => 'matches[password]',
		'address' => 'required|string',
		'phone' => 'required|numeric'
	];

	public $register_errors = [
		'fullname' => [
			'required' => 'Nama lengkap wajib diisi',
			'alpha_space' => 'Nama lengkap harus berupa abjad'
		],
		'nim' => [
			'required' => 'NIM wajib diisi',
			'numeric' => 'NIM harus berupa angka',
			'is_unique' => 'NIM sudah terdaftar'
		],
		'email' => [
			'required' => 'Email wajib diisi',
			'valid_email' => 'Masukkan format email dengan benar',
			'is_unique' => 'Email sudah terdaftar',
		],
		'address' => [
			'required' => 'Alamat wajib diisi',
		],
		'phone' => [
			'required' => 'No. Telepon wajib diisi',
			'numeric' => 'No. Telepon harus berupa angka'
		],
		'password' => [
			'required' => 'Password wajib diisi',
			'min_length' => 'Panjang minimal 8 karakter'
		],
		'confirm_password' => [
			'matches' => 'Konfirmasi password tidak sesuai dengan password'
		]
	];

	// Validation for Forgot Password
	public $forgotPassword = [
		'nim' => 'required|numeric|is_not_unique[users.nim]',
		'email' => 'required|valid_email|is_not_unique[users.email]'
	];

	public $forgotPassword_errors = [
		'nim' => [
			'required' => 'NIM wajib diisi',
			'numeric' => 'NIM harus berupa angka',
			'is_not_unique' => 'NIM tidak tersedia'
		],
		'email' => [
			'required' => 'Email wajib diisi',
			'valid_email' => 'Masukkan format email dengan benar',
			'is_not_unique' => 'Email tidak tersedia',
		],
	];

	// Validation for Reset Password
	public $resetPassword = [
		'password' => 'required|min_length[8]',
		'confirm_password' => 'required|matches[password]',
	];

	public $resetPassword_errors = [
		'password' => [
			'required' => 'Password baru wajib diisi',
			'min_length' => 'Panjang minimal 8 karakter'
		],
		'confirm_password' => [
			'matches' => 'Konfirmasi password tidak sesuai dengan password'
		]
	];
}
