<?php

namespace App\Controllers;


class AuthController extends BaseController
{
    public function index(): string
    {
        return view('auth/login');
    }
    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // $dataUser = new UserModel();
        // $data = $dataUser->login($username, $password);
        if ($username == 'admin' && $password == 'admin') {
            echo "<script>alert('Your message Here');</script>";
        } else {
            echo "<script>alert('Your gagal Here');</script>";
        }
        // return redirect()->to(base_url('login'));
    }
}
