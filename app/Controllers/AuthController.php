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
        session()->set('user_id', $userData['id']);
        session()->set('username', $userData['username']);
        session()->set('role', $userData['role']);
        switch ($userData['role']) {
            case 'admin':
                return redirect()->to(base_url('/admin'));
                break;
            case 'mesin':
                return redirect()->to(base_url('/mesin'));
                break;
            case 'setting':
                return redirect()->to(base_url('/setting'));
                break;
            case 'roso':
                return redirect()->to(base_url('/rosso'));
                break;
            case 'packing':
                return redirect()->to(base_url('/packing'));
                break;
            case 'stoklot':
                return redirect()->to(base_url('/stoklot'));
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
