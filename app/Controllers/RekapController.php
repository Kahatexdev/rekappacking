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
        $Disisial = $this->masterInisial->getMasterInisial($noModel);
        $dataInisial = $this->masterInisial->where('no_model', $noModel)->findAll();
        $fromInisial = [];
        foreach ($dataInisial as $key => $value) {
            $id_proses = $this->flowModel->getIdProses($value['id_inisial']);



            if ($id_proses && array_key_exists('id_proses', $id_proses)) {
                $idProses = $id_proses['id_proses'];
                $mesin = $this->rekapModel->sumMesin($idProses) / 24;
                $rosso = $this->rekapModel->sumRosso($idProses) / 24;
                $sisaRosso = $mesin - $rosso;
                $setting = $this->rekapModel->sumSetting($idProses) / 24;
                $sisaSetting = $rosso - $setting;
                $pin = $this->rekapModel->sumPin($idProses) / 24;
                $pout = $this->rekapModel->sumPout($idProses) / 24;
                $stocklot = $this->rekapModel->sumStocklot($idProses) / 24;
                $stocklot_ = round(number_format($stocklot, 1, '.', ''));
                $sisaPerbaikan = $pin - $pout - $stocklot;
                $gsIn = $this->rekapModel->sumGsin($idProses) / 24;
                $gsOut = $this->rekapModel->sumGsOut($idProses) / 24;
                $qtyIns = $value['po_inisial'];
                $tagihanMesin = 0;
                $lebihMesin = 0;
                if ($mesin > $qtyIns) {
                    $tagihanMesin = $qtyIns - $mesin;
                    $lebihMesin = $mesin - ($qtyIns + $stocklot_);
                }

                $fromInisial[] = [
                    'mesin' => $mesin,
                    'rosso' => $rosso,
                    'sisaRosso' => $sisaRosso,
                    'setting' => $setting,
                    'sisaSetting' => $sisaSetting,
                    'perbaikanIn' => round(number_format($pin, 1, '.', '')),
                    'perbaikanOut' =>  round(number_format($pout, 1, '.', '')),
                    'stocklot' =>  $stocklot_,
                    'sisaPerbaikan' => round(number_format($sisaPerbaikan, 1, '.', '')),
                    'gsIn' => round(number_format($gsIn, 1, '.', '')),
                    'gsOut' => round(number_format($gsOut, 1, '.', '')),
                    'sisaGudang' => round(number_format($gsIn, 1, '.', '')) - round(number_format($gsOut, 1, '.', '')),
                    'tagihanMesin' => $tagihanMesin,
                    'lebihMesin' => $lebihMesin,
                    'style' => $value['style'],
                    'inisial' => $value['inisial'],
                    'area' => $value['area'],
                    'qtyIns' => $value['po_inisial'],
                    'colour' => $value['colour'],
                ];
            }
        }


        $data = [
            'Judul' => 'Detail PDK',
            'pdk' => $noModel,
            'poInisial' => $Disisial['po_inisial'],
            'User' => session()->get('username'),
            'buyer' => $dataPdk["buyer"],
            'area' => $Disisial['area'],
            'no_order' => $dataPdk["no_order"],
            'inisial' => $fromInisial,

        ];
        return view('Packing/Rekap/detail', $data);
    }
}
