<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function mesin_index(): string
    {
        return view('Mesin/Dashboard/index');
    }
    public function dataproduksi(): string
    {

        return view('Mesin/Dataproduksi/dataproduksi');
    }
}
