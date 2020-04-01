<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\AuthModel as model;

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
                $user = $this->authModel->where(['nim' => $this->session->nim, 'email' => $this->session->email])->first();

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
        $users = model('App\Models\AuthModel');

        $nim = $request->getPost('nim');
        $password = $request->getPost('password');

        $data = [
            'password' => $password,
            'password_sha1' => sha1($password),
            'password_md5' => md5($password)
        ];

        $user = $users->where('nim', $nim)->first();

        $users->update($user->id, $data);

        return redirect('auth/login');
    }
}
