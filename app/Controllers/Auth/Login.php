<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        // Jika user sudah login, maka arahkan ke Route home
        if ($this->session->has('nim')) {
            return redirect('/');
        }
        return view('auth/login');
        // return $this->session->has('nim') ? redirect('/') : view('auth/login');
    }

    public function loginProcess()
    {
        $request = $this->request;

        $nim = $request->getPost('nim');
        $password = $request->getPost('password');

        // Cari user berdasarkan nim
        $user = $this->users->where('nim', $nim)->first();

        // Jika user tidak ditemukan, arahkan kembali ke halaman login
        if (!$user) {
            return view('auth/login');
        } else {
            // Buat password MD5 dan SHA1
            $password_md5 = md5($password);
            $password_sha1 = sha1($password);

            // Cocokkan password yang dimasukkan user dengan enkripsi MD5 dan SHA1
            if (($password_md5 == $user->password_md5) && ($password_sha1 == $user->password_sha1)) {
                // Cocokkan password yang dimasukkan user dengan password hash
                if (password_verify($password, $user->password_hash)) {
                    // Berhasil login, buat session untuk user
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
        // Hapus seluruh session yang dibuat untuk user
        $this->session->destroy();

        return redirect('/');
    }
}
