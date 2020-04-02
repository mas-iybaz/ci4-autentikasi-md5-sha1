<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\Controller;

class Register extends BaseController
{
    public function index()
    {
        return view('auth/register', ['validate' => $this->validation]);
    }

    public function registerProcess()
    {
        $request = $this->request;

        if (!$this->validation->run($request->getPost(), 'register')) {
            return redirect()->back()->withInput();
        } else {
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

            $this->users->insert($data);

            return redirect('auth/login');
        }
    }
}
