<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RekapController extends BaseController
{
    public function rekapPacking()
    {
        $dataProd = $this->prodModel->getDataRekapan();
        $dataJoined = [];
        dd($dataProd);
        foreach ($dataProd as $prod) {
            $no_model = $prod['no_model'];
            $area  = $prod['area'];
            $delivery = $prod['delivery'];
            $id_inisial = $prod['id_inisial'];
            $dataJoined[] = [
                'no_model'   => $no_model,
                'area' => $area,
                'delivery' => $delivery,
                'id_inisial' => $id_inisial,
            ];
        }
        dd($dataJoined);
        $data = [
            'Data' => $dataJoined,
            'Tabel'  => "Tabel Rekapan Packing",
            'Judul'  => "Rekapan Packing",
            'User'   => session()->get('username'),
        ];

        return view('Packing/Rekap/rekap', $data);
    }
}
