<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\Controller;

class Register extends BaseController
{
    public function index()
    {
        if ($this->session->has('nim')) {
            return redirect('/');
        }

        // Tampilkan halaman registrasi dengan validasi
        return view('auth/register', ['validate' => $this->validation]);
    }

    public function registerProcess()
    {
        $request = $this->request;

        // Lakukan validasi masukan user, jika tidak sesuai ketentuan kembalikan ke halaman registrasi dengan pesan kesalahan
        if (!$this->validation->run($request->getPost(), 'register')) {
            return redirect()->back()->withInput();
        } else {
            $password = $request->getPost('password');

            // Buat data yang akan dimasukkan kedalam database
            $data = [
                'fullname' => $request->getPost('fullname'),
                'nim' => $request->getPost('nim'),
                'address' => $request->getPost('address'),
                'phone' => $request->getPost('phone'),
                'email' => $request->getPost('email'),
                'password' => $password,
                // Enkripsi masukan password user dengan MD5 dan SHA1, dan juga Hash
                'password_md5' => md5($password),
                'password_sha1' => sha1($password),
                'password_hash' => password_hash($password, PASSWORD_DEFAULT)
            ];

            // Masukkan data user baru kedalam database
            $this->users->insert($data);

            return redirect('auth/login');
        }
    }
}
