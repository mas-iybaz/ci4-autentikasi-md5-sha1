<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Reset extends BaseController
{
    public function index($key)
    {
        // Cari user berdasar nim yang dijadikan parameter saat reset password akun
        $user = $this->users->where('nim', $key)->first();

        if (!$user) {
            return redirect('auth');
        } else {
            $data = [
                '_nim' => $user->nim,
                'nim' => $user->nim,
                '_email' => $user->email
            ];

            // Buat session untuk reset password
            $this->session->set($data);

            return redirect('reset_password');
        }
    }

    public function show()
    {
        if (!$this->session->has('_nim')) {
            if (!$this->session->has('nim')) {
                return redirect('auth/login');
            } else {
                return redirect('/');
            }
        } else {
            if (!($this->session->has('_email'))) {
                return redirect('auth/login');
            } else {
                $user = $this->users->where(['nim' => $this->session->_nim, 'email' => $this->session->_email])->first();

                if (!$user) {
                    return redirect('auth/login');
                } else {
                    $data['user'] = $user;
                    $data['validate'] = $this->validation;

                    return view('auth/reset_password', $data);
                }
            }
        }
    }

    // Fungsi untuk reset password
    public function update()
    {
        $request = $this->request;

        // Jalankan validasi untuk reset-password
        if (!$this->validation->run($request->getPost(), 'resetPassword')) {
            return redirect()->back()->withInput();
        } else {
            $nim = $request->getPost('nim');
            $password = $request->getPost('password');

            $data = [
                'password' => $password,
                'password_sha1' => sha1($password),
                'password_md5' => md5($password),
                'password_hash' => password_hash($password, PASSWORD_DEFAULT)
            ];

            // Cari user berdasarkan nim
            $user = $this->users->where('nim', $nim)->first();

            // Update data password baru user
            $this->users->update($user->id, $data);

            return redirect('auth/login');
        }
    }
}
