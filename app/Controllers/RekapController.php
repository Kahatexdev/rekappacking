<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RekapController extends BaseController
{
    public function rekapPacking()
    {

        $data = [
            'Tabel' => "Tabel Rekapan Packing",
            'Judul' => "Rekapan Packing",
            'User' => session()->get('username'),
        ];
        return view('Packing/Rekap/rekap', $data);
    }
}
