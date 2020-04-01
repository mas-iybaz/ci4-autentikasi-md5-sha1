<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Register extends BaseController
{
    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
    }

    public function index()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $request = $this->request;
        $users = model('App\Models\AuthModel');

        $password = $request->getPost('password');

        $data = [
            'fullname' => $request->getPost('fullname'),
            'nim' => $request->getPost('nim'),
            'address' => $request->getPost('address'),
            'phone' => $request->getPost('phone'),
            'email' => $request->getPost('email'),
            'password' => $password,
            'password_md5' => md5($password),
            'password_sha1' => sha1($password)
        ];

        $users->insert($data);

        return redirect('auth/login');
    }
}
