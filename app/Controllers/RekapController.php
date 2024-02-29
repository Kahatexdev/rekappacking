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
        $header = [];
        foreach ($dataInisial as &$value) {
            $id_proses = $this->flowModel->getIdProses($value['id_inisial']);
            if ($id_proses && array_key_exists('id_proses', $id_proses)) {
                $idProses = $id_proses['id_proses'];
                $idInisial = $value['id_inisial'];
                $mesin = $this->rekapModel->sumMesin($idProses) / 24;
                $rosso = $this->rekapModel->sumRosso($idProses) / 24;
                $setting = $this->rekapModel->sumSetting($idProses) / 24;
                $pin = $this->rekapModel->sumPin($idProses) / 24;
                $pout = $this->rekapModel->sumPout($idProses) / 24;
                $stocklot = $this->rekapModel->sumStocklot($idProses) / 24;
                $h1 = $this->dataProses->filterProses($id_proses['proses_1'])["kategori"];
                $h2 = $this->dataProses->filterProses($id_proses['proses_2'])["kategori"];
                $h3 = $this->dataProses->filterProses($id_proses['proses_3'])["kategori"];
                $h4 = "Sisa " . $h2;
                $h5 = "Sisa " . $h3;
                $sisaSetting = $rosso - ($setting + $pin + $stocklot);
                $sisaPerbaikan = $pin - $pout - $stocklot;
                $stocklot = $this->rekapModel->sumStocklot($idProses) / 24;
                $gsIn = $this->rekapModel->sumGsin($idProses) / 24;
                $gsOut = $this->rekapModel->sumGsOut($idProses) / 24;
                $tagihanMesin = 0;
                $lebihMesin = 0;
                $sisaGudang = $gsIn - $gsOut;
                if ($sisaGudang < 0) {
                    $sisaGudang = 0;
                }
                if ($sisaSetting < 0) {
                    $sisaSetting = 0;
                }
                if ($mesin > $value["po_inisial"]) {
                    $tagihanMesin = $value["po_inisial"] - $mesin;
                    $lebihMesin = $mesin - ($value["po_inisial"] + $stocklot);
                    if ($tagihanMesin < 0) {
                        $tagihanMesin = 0;
                    }
                }
                $header = [
                    $h1,
                    $h4,
                    $h2,
                    $h5,
                    $h3,
                ];
                $proses = [
                    $h1 => $mesin,
                    $h4 => $mesin - $rosso,
                    $h2 => $rosso,
                    $h5 => $sisaSetting,
                    $h3 => $setting,
                    "perbaikanIn" => $pin,
                    "perbaikanOut" => $pout,
                    "sisaPerbaikan" => $sisaPerbaikan,
                    "stockLot" => $stocklot,
                    "gsIn" => $gsIn,
                    "gsOut" => $gsOut,
                    "sisaGudang" => $sisaGudang,
                    "tagihanMesin" => $tagihanMesin,
                    "lebihMesin" => $lebihMesin,
                    'idInisial' => $idInisial
                ];
                $value["proses"] = $proses;
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
            'inisial' => $dataInisial,
            'header_prod' => $header,
        ];
        return view('Packing/Rekap/detail', $data);
    }
}
