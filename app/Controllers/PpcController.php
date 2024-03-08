<?php

namespace App\Controllers;



use App\Controllers\BaseController;

class PpcController extends BaseController
{

    public function index()
    {
        $dataPdk = $this->dataPDK->findAll();
        $dataJoined = [];
        foreach ($dataPdk as $dp) {
            $dataJoined[] = [
                'no_model' => $dp['no_model'],
                'no_order' => $dp['no_order'],
                'buyer' => $dp['buyer'],

            ];
        }
        $data = [
            'Judul' => 'Dashboard Packing',
            'User' => session()->get('username'),
            'Data' => $dataJoined,
        ];
        return view('Ppc/index', $data);
    }
    public function downloadExcel()
    {
        // Tentukan path file Excel di folder public
        $filePath = FCPATH . '/excel/Format-Master-Data.xlsx';

        // Pastikan file ada
        if (!file_exists($filePath)) {
            // File tidak ditemukan, berikan respons 404 (Not Found)
            return $this->response->setStatusCode(404)->setJSON(['error' => 'File not found.']);
        }

        // Setel tipe MIME yang sesuai
        $mimeType = mime_content_type($filePath);

        // Paksa untuk mengunduh
        $this->response->setHeader('Content-Type', $mimeType);
        $this->response->setHeader('Content-Disposition', 'attachment; filename="Format-Master-Data.xlsx"');
        $this->response->setBody(file_get_contents($filePath));
        return $this->response;
    }
    public function getInisial()
    {
        // Ambil no_model dari permintaan POST
        $noModel = $this->request->getPost('no_model');


        $inisialData = $this->masterInisial->getInisialsByNoModel($noModel);


        // Konversi data menjadi format JSON
        $jsonResponse = json_encode($inisialData);

        return $this->response->setJSON($jsonResponse);
    }
    public function flowproses($noModel)
    {
        $id_inisial = $this->masterInisial->getInisialsByNoModel($noModel);
        $dataJoined = [];
        foreach ($id_inisial as $id) {
            $idInisial = $id['id_inisial'];
            $getIdProses = $this->flowModel->getIdProsess($idInisial);
            foreach ($getIdProses as $proses) {

                $dataJoined[] = [

                    'inisial' => $id['inisial'],
                    'id_proses' => $proses['id_proses'],
                    'proses1' => $proses['proses_1'],
                    'proses2' => $proses['proses_2'],
                    'proses3' => $proses['proses_3'],
                    'proses4' => $proses['proses_4'],
                    'proses5' => $proses['proses_5'],
                    'proses6' => $proses['proses_6'],
                    'proses7' => $proses['proses_7'],
                    'proses8' => $proses['proses_8'],
                    'proses9' => $proses['proses_9'],
                    'proses10' => $proses['proses_10'],
                    'proses11' => $proses['proses_11'],
                    'proses12' => $proses['proses_12'],
                    'proses13' => $proses['proses_13'],
                    'proses14' => $proses['proses_14'],
                    'proses15' => $proses['proses_15'],
                ];
            }
        }

        $data = [
            'Judul' => 'Input flowproses',
            'User' => session()->get('username'),
            'Header' => 'Input Flow Proses',
            'Data' => $dataJoined,
            'no_model' => $noModel,
            'proses' => $this->dataProses->findAll(),

        ];
        return view('Ppc/flowproses', $data);
    }
    public function updateFlow($idProses)
    {
        $id_proses = intval($idProses);
        $no_model = $this->request->getPost('noModel');
        $data = [
            'proses_1' => $this->request->getPost('proses1'),
            'proses_2' => $this->request->getPost('proses2'),
            'proses_3' => $this->request->getPost('proses3'),
            'proses_4' => $this->request->getPost('proses4'),
            'proses_5' => $this->request->getPost('proses5'),
            'proses_6' => $this->request->getPost('proses6'),
            'proses_7' => $this->request->getPost('proses7'),
            'proses_8' => $this->request->getPost('proses8'),
            'proses_9' => $this->request->getPost('proses9'),
            'proses_10' => $this->request->getPost('proses10'),
        ];
        $result = $this->flowModel->updateFlow($id_proses, $data);
        if ($result) {
            return redirect()->to(base_url('ppc/flowproses/' . $no_model))->with('success', 'Berhasil Memperbarui Data');
        } else {
            return redirect()->to(base_url('ppc/flowproses/' . $no_model))->with('error', 'Gagal Memperbarui Data');
        }
    }
    public function requestPacking()
    {
        $dataPdk = $this->dataPDK->getPermintaanPacking();
        $dataJoined = [];
        foreach ($dataPdk as $dp) {
            $dataJoined[] = [
                'no_model' => $dp['no_model'],
                'no_order' => $dp['no_order'],
                'buyer' => $dp['buyer'],
            ];
        }
        $data = [
            'Judul' => 'Dashboard Packing',
            'User' => session()->get('username'),
            'Data' => $dataJoined,
        ];
        return view('Ppc/request', $data);
    }
    public function detailrequest($noModel)
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
        return view('Ppc/detailrequest', $data);
    }
}
