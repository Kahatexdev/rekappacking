<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RekapController extends BaseController
{
    public function rekapPacking()
    {
        $dataPdk = $this->dataPDK->findAll();
        $dataJoined = [];
        foreach ($dataPdk as $dp) {
            $no_model = $dp['no_model'];


            $dataJoined[] = [
                'no_model' => $no_model
            ];
        }


        $data = [
            'inidata' => $dataJoined,
            'Tabel'  => "Tabel Rekapan Packing",
            'Judul'  => "Rekapan Packing",
            'User'   => session()->get('username'),
        ];

        return view('Packing/Rekap/rekap', $data);
    }
    public function detailRekap($noModel)
    {
        $dataPdk = $this->dataPDK->where(['no_model' => $noModel])->first();
        $dataInisial = $this->masterInisial->getInisialsByNoModel($noModel);
        $fromInisial = [];
        foreach ($dataInisial as $dataIns) {

            $fromInisial[] = [
                'style' => $dataIns['style'],
                'inisial' => $dataIns['inisial'],
                'area' => $dataIns['area'],
                'qtyIns' => $dataIns['po_inisial'],
                'colour' => $dataIns['colour']
            ];
        }

        $data = [
            'Judul' => 'Detail PDK',
            'User' => session()->get('username'),
            'pdk' => $dataPdk['no_model'],
            'no_order' => $dataPdk['no_order'],
            'buyer' => $dataPdk['buyer'],
            'inisial' => $fromInisial
        ];

        return view('Packing/Rekap/detail', $data);
    }
}
