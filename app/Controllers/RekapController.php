<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RekapController extends BaseController
{
    public function rekapPacking()
    {
        $data = $this->prodModel->getDataRekapan();
        dd($data);
        $dataJoined = [];

        foreach ($data as $np) {


            $dataJoined[] = [];
        }

        $data = [
            'Data'   => $dataJoined,
            'Tabel'  => "Tabel Rekapan Packing",
            'Judul'  => "Rekapan Packing",
            'User'   => session()->get('username'),
        ];

        return view('Packing/Rekap/rekap', $data);
    }
}
