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

            $data = [
                '_nim' => $nim,
                '_email' => $email
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
}
