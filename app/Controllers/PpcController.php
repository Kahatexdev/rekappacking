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
}
