<?php

namespace App\Controllers;

use App\Models\Usermodels;

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
        $UserModel = new Usermodels;
        $userData = $UserModel->login($username, $password);
        if (!$userData) {
            return redirect()->to(base_url('/login'))->withInput()->with('error', 'Invalid username or password');
        }
        session()->set('username', $userData['username']);
        session()->set('role', $userData['role']);
        switch ($userData['role']) {
            case 'packing':
                return redirect()->to(base_url('/packing'));
                break;
            case 'monitoring':
                return redirect()->to(base_url('/monitoring'));
                break;

            default:
                return redirect()->to(base_url('/login'));
                break;
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
