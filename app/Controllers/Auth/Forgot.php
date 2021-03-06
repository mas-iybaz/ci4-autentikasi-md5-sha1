<?php
// Test Comment

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Forgot extends BaseController
{
    public function index()
    {
        if ($this->session->has('nim')) {
            return redirect('/');
        } else {
            return view('auth/forgot_password', ['validate' => $this->validation]);
        }
    }

    public function resetProcess()
    {
        $request = $this->request;

        if (!$this->validation->run($request->getPost(), 'forgotPassword')) {
            return redirect()->back()->withInput();
        } else {
            $nim = $request->getPost('nim');
            $email = $request->getPost('email');

            $user = $this->users->where('nim', $nim)->first();

            if (!$user) {
                return view('auth/forgot_password');
            } else {
                if (!($email == $user->email)) {
                    return view('auth/forgot_password');
                } else {
                    // Muat library untuk SMTP (Email)
                    $mailer = \Config\Services::email();

                    // Buat konfigurasi untuk pengiriman Email
                    $mailer->setFrom('no-reply@gilgamesh.id', 'Gilgamesh');
                    $mailer->setTo($email);

                    $mailer->setSubject('Reset Email');
                    $mailer->setMessage('klik link dibawah ini untuk mengatur kata sandi baru : </br> <a href="localhost:8080/auth/reset/' . $user->nim . '">Reset Password</a>');

                    // Kirimkan Email, jika gagal kembali ke halaman login, jika berhasil maka ditampilkan halaman konfirmasi
                    if ($mailer->send()) {
                        return view('auth/email_reset');
                    } else {
                        return redirect('auth/login');
                    }
                }
            }
        }
    }
}
