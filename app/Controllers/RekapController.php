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
        $qtyInisial = $this->masterInisial->sumQTY($noModel);
        $fromInisial = [];
        foreach ($dataInisial as $dataIns) {
            $idInisial = $dataIns['id_inisial'];
            $id_proses = $this->flowModel->getIdProses($idInisial);
            if ($id_proses && array_key_exists('id_proses', $id_proses)) {
                $idProses   = $id_proses['id_proses'];
                $mesin = $this->rekapModel->sumMesin($idProses) / 24;
                $rosso = $this->rekapModel->sumRosso($idProses) / 24;
                $sisaRosso = $mesin - $rosso;
                $setting = $this->rekapModel->sumSetting($idProses) / 24;
                $pin = $this->rekapModel->sumPin($idProses) / 24;
                $pout = $this->rekapModel->sumPout($idProses) / 24;
                $stocklot = $this->rekapModel->sumStocklot($idProses) / 24;
                $sisaPerbaikan = $pin - $pout - $stocklot;
                $gsIn = $this->rekapModel->sumGsin($idProses) / 24;
                $gsOut = $this->rekapModel->sumGsOut($idProses) / 24;

                //formated result
                $pin_ = number_format($pin, 1, '.', '');
                $pout_ = number_format($pout, 1, '.', '');
                $stocklot_ = number_format($stocklot, 1, '.', '');
                $sisaPerbaikan_ = number_format($sisaPerbaikan, 1, '.', '');
                $gsIn_ = number_format($gsIn, 1, '.', '');
                $gsOut_ = number_format($gsOut, 1, '.', '');
                $sisaGudang = $gsIn - $gsOut;
                $sisaGudang_ =  number_format($sisaGudang, 1, '.', '');

                $fromInisial[] = [
                    'style' => $dataIns['style'],
                    'inisial' => $dataIns['inisial'],
                    'area' => $dataIns['area'],
                    'qtyIns' => $dataIns['po_inisial'],
                    'colour' => $dataIns['colour'],
                    'mesin' => $mesin,
                    'rosso' => $rosso,
                    'sisaRosso' => $sisaRosso,
                    'setting' => $setting,
                    'perbaikanIn' => $pin_,
                    'perbaikanOut' => $pout_,
                    'stocklot' => $stocklot_,
                    'sisaPerbaikan' => $sisaPerbaikan_,
                    'gsIn' => $gsIn_,
                    'gsOut' => $gsOut_,
                    'sisaGudang' => $sisaGudang_,

                ];
            }
            $data = [
                'Judul' => 'Detail PDK',
                'User' => session()->get('username'),
                'pdk' => $dataPdk['no_model'],
                'no_order' => $dataPdk['no_order'],
                'buyer' => $dataPdk['buyer'],
                'poInisial' => $qtyInisial,
                'inisial' => $fromInisial
            ];
        }
        return view('Packing/Rekap/detail', $data);
    }
}
