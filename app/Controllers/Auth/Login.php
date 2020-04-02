<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
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
        return view('auth/login');
    }

    public function loginProcess()
    {
        $request = $this->request;

        $nim = $request->getPost('nim');
        $password = $request->getPost('password');

        $user = $this->users->where('nim', $nim)->first();

        if (!$user) {
            return view('auth/login');
        } else {
            $password_md5 = md5($password);
            $password_sha1 = sha1($password);

            if (($password_md5 == $user->password_md5) && ($password_sha1 == $user->password_sha1)) {
                $this->session->set('nim', $nim);

                return redirect('/');
            } else {
                return view('auth/login');
            }
        }
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect('/');
    }
}
