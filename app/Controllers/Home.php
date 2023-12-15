<?php

namespace App\Controllers;


class Home extends BaseController
{

    // user mesin
    public function mesin_index(): string
    {
        $data = [
            'Judul' => 'Data Mesin',
            'User' => 'User Mesin'
        ];
        return view('User/Mesin/index', $data);
    }
    public function mesindata(): string
    {
        $data = [
            'Judul' => 'Data Mesin',
            'User' => 'User Mesin'
        ];

        return view('User/Mesin/dataproduksi', $data);
    }
    //user Rosso
    public function rosso_index(): string
    {
        $data = [
            'Judul' => 'Data Rosso',
            'User' => 'User Rosso'
        ];
        return view('User/Rosso/index', $data);
    }
    public function rossodata(): string
    {
        $data = [
            'Judul' => 'Data Rosso',
            'User' => 'User Rosso'
        ];

        return view('User/Rosso/dataproduksi', $data);
    }
    //user setting
    public function setting_index(): string
    {
        $data = [
            'Judul' => 'Data setting',
            'User' => 'User setting'
        ];
        return view('User/Setting/index', $data);
    }
    public function settingdata(): string
    {
        $data = [
            'Judul' => 'Data setting',
            'User' => 'User setting'
        ];

        return view('User/Setting/dataproduksi', $data);
    }

    //user packing
    public function packing_index(): string
    {
        $data = [
            'Judul' => 'Data packing',
            'User' => 'User packing'
        ];
        return view('User/Packing/index', $data);
    }
    public function packingdata(): string
    {
        $data = [
            'Judul' => 'Data packing',
            'User' => 'User packing'
        ];

        return view('User/Packing/dataproduksi', $data);
    }
}
