<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Forgot extends BaseController
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
        return view('auth/forgot_password');
    }

    public function resetProcess()
    {
        $request = $this->request;

        $nim = $request->getPost('nim');
        $email = $request->getPost('email');

        $data = [
            'nim' => $nim,
            'email' => $email
        ];

        $user = $this->users->where('nim', $nim)->first();

        if (!$user) {
            return view('auth/forgot_password');
        } else {
            if (!($email == $user->email)) {
                return view('auth/forgot_password');
            } else {
                $this->session->set($data);
                return redirect('auth/reset');
            }
        }
    }
}
