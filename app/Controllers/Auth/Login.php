<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
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
                if (password_verify($password, $user->password_hash)) {
                    $this->session->set('nim', $nim);

                    return redirect('/');
                } else {
                    return view('auth/login');
                }
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
