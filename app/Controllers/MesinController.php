<?php

namespace App\Controllers;


class MesinController extends BaseController
{
    protected $filters;

    public function __construct()
    {
        $this->filters = ['role' => ['mesin']];
        $this->isLogedin();
    }
    protected function isLogedin()
    {
        if (!session()->get('user_id')) {
            return redirect()->to(base_url('/login'));
        }
    }
    // user mesin
    public function mesin_index(): string
    {
        $data = [
            'Judul' => 'Data Mesin',
            'User' => session()->get('role')
        ];
        return view('User/Mesin/index', $data);
    }
    public function mesindata(): string
    {
        $data = [
            'Judul' => 'Data Mesin',
            'User' => session()->get('role')
        ];

        return view('User/Mesin/dataproduksi', $data);
    }
}
