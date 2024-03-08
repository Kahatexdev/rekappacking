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
                'no_model' => $no_model,
                'status' => $dp['status']
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
                $pluspacking = $value['plus_packing'];
                $totalPacking = $value['total'];
                $ket = $value['keterangan'];
                $mesin = $this->rekapModel->sumMesin($idProses) / 24;
                $rosso = $this->rekapModel->sumRosso($idProses) / 24;
                $setting = $this->rekapModel->sumSetting($idProses) / 24;
                $pin = $this->rekapModel->sumPin($idProses) / 24;
                $pout = $this->rekapModel->sumPout($idProses) / 24;
                $deffect = $this->rekapModel->sumDeffect($idProses);
                $stocklot = $this->rekapModel->sumStocklot($idProses) / 24;
                $pbstc = $this->rekapModel->sumPBSTC($idProses) / 24;
                $other = $stocklot - $pbstc;
                $h1 = $this->dataProses->filterProses($id_proses['proses_1'])["kategori"];
                $h2 = $this->dataProses->filterProses($id_proses['proses_2'])["kategori"];
                $h3 = $this->dataProses->filterProses($id_proses['proses_3'])["kategori"];
                $h4 = "Sisa " . $h2;
                $h5 = "Sisa " . $h3;
                $sisaSetting = $rosso - ($setting + $pin + $other);
                $sisaPerbaikan = $pin - $pout - $pbstc;
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
                if ($mesin < $value["po_inisial"]) {
                    $tagihanMesin = $value["po_inisial"] - $mesin;

                    if ($tagihanMesin < 0) {
                        $tagihanMesin = 0;
                    }
                }
                if ($mesin > $value["po_inisial"]) {
                }
                $lebihMesin = $mesin - ($value["po_inisial"] + $stocklot);
                $bsBelumGanti = (($value["po_inisial"] + $stocklot + $deffect) - $mesin) - $tagihanMesin;
                if ($bsBelumGanti < 0) {
                    $bsBelumGanti = 0;
                }
                $header = [
                    $h1,
                    $h2,
                    $h3,
                    $h4,
                    $h5,
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
                    "other" => $other,
                    "pbstc" => $pbstc,
                    "gsIn" => $gsIn,
                    "gsOut" => $gsOut,
                    "sisaGudang" => $sisaGudang,
                    'deffect' => $deffect,
                    "tagihanMesin" => $tagihanMesin,
                    "lebihMesin" => $lebihMesin,
                    'bsBelumGanti' => $bsBelumGanti,
                    'idInisial' => $idInisial,
                    'plusPacking' => $pluspacking,
                    'totalPacking' => $totalPacking,
                    'ket' => $ket,
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
    public function saveRekap()
    {
        // Mengambil data JSON dari permintaan
        $requestData = json_decode($this->request->getBody());
        // Memeriksa apakah data berhasil di-decode
        if (!$requestData) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Data JSON tidak valid']);
        }

        // Mengambil nilai id, field, dan value
        $id = $requestData->id;
        $field = $requestData->field;
        $value = $requestData->value;
        $this->masterInisial->update($id, [$field => $value]);
        return $this->response->setStatusCode(200)->setJSON(['message' => 'Data berhasil diperbarui']);
    }
    public function export($noModel)
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
                $pluspacking = $value['plus_packing'];
                $totalPacking = $value['total'];
                $ket = $value['keterangan'];
                $mesin = $this->rekapModel->sumMesin($idProses) / 24;
                $rosso = $this->rekapModel->sumRosso($idProses) / 24;
                $setting = $this->rekapModel->sumSetting($idProses) / 24;
                $pin = $this->rekapModel->sumPin($idProses) / 24;
                $pout = $this->rekapModel->sumPout($idProses) / 24;
                $deffect = $this->rekapModel->sumDeffect($idProses);
                $stocklot = $this->rekapModel->sumStocklot($idProses) / 24;
                $pbstc = $this->rekapModel->sumPBSTC($idProses) / 24;
                $other = $stocklot - $pbstc;
                $h1 = $this->dataProses->filterProses($id_proses['proses_1'])["kategori"];
                $h2 = $this->dataProses->filterProses($id_proses['proses_2'])["kategori"];
                $h3 = $this->dataProses->filterProses($id_proses['proses_3'])["kategori"];
                $h4 = "Sisa " . $h2;
                $h5 = "Sisa " . $h3;
                $sisaSetting = $rosso - ($setting + $pin + $other);
                $sisaPerbaikan = $pin - $pout - $pbstc;
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
                if ($mesin < $value["po_inisial"]) {
                    $tagihanMesin = $value["po_inisial"] - $mesin;

                    if ($tagihanMesin < 0) {
                        $tagihanMesin = 0;
                    }
                }
                if ($mesin > $value["po_inisial"]) {
                }
                $lebihMesin = $mesin - ($value["po_inisial"] + $stocklot);
                $bsBelumGanti = (($value["po_inisial"] + $stocklot + $deffect) - $mesin) - $tagihanMesin;
                if ($bsBelumGanti < 0) {
                    $bsBelumGanti = 0;
                }
                $header = [
                    $h1,
                    $h2,
                    $h3,
                    $h4,
                    $h5,
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
                    "other" => $other,
                    "pbstc" => $pbstc,
                    "gsIn" => $gsIn,
                    "gsOut" => $gsOut,
                    "sisaGudang" => $sisaGudang,
                    'deffect' => $deffect,
                    "tagihanMesin" => $tagihanMesin,
                    "lebihMesin" => $lebihMesin,
                    'idInisial' => $idInisial,
                    'bsBelumGanti' => $bsBelumGanti,
                    'plusPacking' => $pluspacking,
                    'totalPacking' => $totalPacking,
                    'ket' => $ket,
                ];
                $value["proses"] = $proses;
            }
        }
        $data = [
            'Judul' => 'Rekap Packing',
            'pdk' => $noModel,
            'poInisial' => $Disisial['po_inisial'],
            'User' => session()->get('username'),
            'buyer' => $dataPdk["buyer"],
            'area' => $Disisial['area'],
            'no_order' => $dataPdk["no_order"],
            'inisial' => $dataInisial,
            'header_prod' => $header,

        ];
        return view('Packing/Rekap/export', $data);
    }

    public function reqpacking($noModel)
    {
        $status = 'Menunggu Approval';
        $field = 'status';

        $update = $this->dataPDK->update($noModel, [$field => $status]);
        if ($update) {
            return redirect()->to(base_url('packing/rekap/'))->with('success', 'Berhasil Meminta tambahan packing');
        } else {
            return redirect()->to(base_url('packing/rekap/'))->with('error', 'Gagal Meminta tambahan packing');
        }
    }
}
