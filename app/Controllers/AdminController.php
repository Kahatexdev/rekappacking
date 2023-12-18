<?php

namespace App\Controllers;


class AdminController extends BaseController
{
    protected $filters;

    public function __construct()
    {
        if ($this->filters = ['role' => ['admin']] != session()->get('role')) {
            return redirect()->to(base_url('/login'));
        }
        $this->isLogedin();
    }
    protected function isLogedin()
    {
        if (!session()->get('user_id')) {
            return redirect()->to(base_url('/login'));
        }
    }


    public function index()
    {

        $data = [
            'Judul' => 'Dashboard Admin',
            'User' => session()->get('username'),
            'Tabel' => 'Data Produksi'

        ];
        return view('Admin/index', $data);
    }

    //mesin
    public function mesin()
    {
        $data = [
            'Judul' => 'Data Produksi Mesin',
            'User' => 'Admin',
            'Tabel' => 'Data Produksi Mesin'
        ];
        return view('Admin/Mesin/mesin', $data);
    }
    public function mesin_update()
    {
        $data = [
            'Judul' => 'Edit Data Mesin',
            'User' => 'Admin',
            'Header' => 'Edit Data Produksi Mesin'
        ];
        return view('Admin/Mesin/editmesin', $data);
    }

    //rosso
    public function rosso()
    {
        $data = [
            'Judul' => 'Data Produksi rosso',
            'User' => 'Admin',
            'Tabel' => 'Data Produksi rosso'
        ];
        return view('Admin/Rosso/rosso', $data);
    }

    //setting
    public function setting()
    {
        $data = [
            'Judul' => 'Data Produksi setting',
            'User' => 'Admin',
            'Tabel' => 'Data Produksi setting'
        ];
        return view('Admin/Setting/setting', $data);
    }


    // packing
    public function packing()
    {
        $data = [
            'Judul' => 'Data Produksi packing',
            'User' => 'Admin',
            'Tabel' => 'Data Produksi packing'
        ];
        return view('Admin/Packing/packing', $data);
    }

    //stoklot
    public function stoklot()
    {
        $data = [
            'Judul' => 'Data stoklot',
            'User' => 'Admin',
            'Tabel' => 'Data  stoklot'
        ];
        return view('Admin/Stoklot/stoklot', $data);
    }
}
