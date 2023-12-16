<?php

namespace App\Controllers;


class AdminController extends BaseController
{
    public function index(): string
    {
        $data = [
            'Judul' => 'Dashboard Admin',
            'User' => 'Admin'
        ];
        return view('Admin/index', $data);
    }

    //mesin
    public function mesin(): string
    {
        $data = [
            'Judul' => 'Data Produksi Mesin',
            'User' => 'Admin',
            'Tabel' => 'Data Produksi Mesin'
        ];
        return view('Admin/Mesin/mesin', $data);
    }
    public function mesin_update(): string
    {
        $data = [
            'Judul' => 'Edit Data Mesin',
            'User' => 'Admin',
            'Header' => 'Edit Data Produksi Mesin'
        ];
        return view('Admin/Mesin/editmesin', $data);
    }

    //rosso
    public function rosso(): string
    {
        $data = [
            'Judul' => 'Data Produksi rosso',
            'User' => 'Admin',
            'Tabel' => 'Data Produksi rosso'
        ];
        return view('Admin/Rosso/rosso', $data);
    }

    //setting
    public function setting(): string
    {
        $data = [
            'Judul' => 'Data Produksi setting',
            'User' => 'Admin',
            'Tabel' => 'Data Produksi setting'
        ];
        return view('Admin/Setting/setting', $data);
    }


    // packing
    public function packing(): string
    {
        $data = [
            'Judul' => 'Data Produksi packing',
            'User' => 'Admin',
            'Tabel' => 'Data Produksi packing'
        ];
        return view('Admin/Packing/packing', $data);
    }

    //stoklot
    public function stoklot(): string
    {
        $data = [
            'Judul' => 'Data stoklot',
            'User' => 'Admin',
            'Tabel' => 'Data  stoklot'
        ];
        return view('Admin/Stoklot/stoklot', $data);
    }
}
