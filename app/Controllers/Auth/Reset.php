<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Reset extends BaseController
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
        if (!$this->session->has('nim')) {
            return redirect('auth/login');
        } else {
            if (!($this->session->has('email'))) {
                return redirect('auth/login');
            } else {
                $user = $this->users->where(['nim' => $this->session->nim, 'email' => $this->session->email])->first();

                if (!$user) {
                    return redirect('auth/login');
                } else {
                    $data['user'] = $user;

                    return view('auth/reset_password', $data);
                }
            }
        }
    }

    public function update()
    {
        $request = $this->request;

        $nim = $request->getPost('nim');
        $password = $request->getPost('password');

        $data = [
            'password' => $password,
            'password_sha1' => sha1($password),
            'password_md5' => md5($password)
        ];

        $user = $this->users->where('nim', $nim)->first();

        $this->users->update($user->id, $data);

        return redirect('auth/login');
    }
}
