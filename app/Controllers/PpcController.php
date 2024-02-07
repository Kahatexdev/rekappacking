<?php

namespace App\Controllers;

use App\Models\DataModel;
use App\Models\PDKModels;
use App\Models\FlowModels;
use App\Models\MasterProses;
use App\Models\ShipmentModel;
use App\Models\MasterInisial;
use App\Models\ProductionModel;


use App\Controllers\BaseController;

class PpcController extends BaseController
{
    protected $filters;
    protected $dataPDK;
    protected $dataModel;
    protected $dataProses;
    protected $masterInisial;
    protected $shipment;
    protected $flowModel;
    protected $prodModel;
    public function __construct()
    {
        $this->dataModel     = new DataModel();
        $this->dataPDK       = new PDKModels();
        $this->dataProses    = new MasterProses();
        $this->masterInisial = new MasterInisial();
        $this->flowModel     = new FlowModels();
        $this->shipment      = new ShipmentModel();
        $this->prodModel     = new ProductionModel();
        if ($this->filters   = ['role' => ['packing']] != session()->get('role')) {
            return redirect()->to(base_url('/login'));
        }
        $this->isLogedin();
    }
    protected function isLogedin()
    {
        if (!session()->get('user_id')) {
            return redirect()->to(base_url('/login'));
        }
    }
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
}
