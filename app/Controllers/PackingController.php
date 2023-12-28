<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;

use App\Models\DataModel;
use App\Models\PDKModels;
use App\Models\FlowModels;
use App\Models\MasterProses;
use App\Models\MasterInisial;

class PackingController extends BaseController
{
    protected $dataPDK;
    protected $filters;
    protected $dataModel;
    protected $dataProses;
    protected $masterInisial;
    protected $flowModel;
    public function __construct()
    {
        $this->dataModel = new DataModel();
        $this->dataPDK = new PDKModels();
        $this->dataProses = new MasterProses();
        $this->masterInisial = new MasterInisial();
        $this->flowModel = new FlowModels();
        if ($this->filters = ['role' => ['packing']] != session()->get('role')) {
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

        $data = [
            'Judul' => 'Dashboard Packing',
            'User' => session()->get('username'),
            'Data' =>  $this->masterInisial->getAllData()
        ];
        return view('Packing/index', $data);
    }
    public function importPDK()
    {
        $file = $this->request->getFile('excel_file');

        if ($file->isValid() && !$file->hasMoved()) {
            $spreadsheet = IOFactory::load($file);
            $data = $spreadsheet->getActiveSheet();
            if (!empty($data)) {
                $no_model =  $data->getCell('B' . '4')->getValue();
                $no_order =   $data->getCell('B' . '5')->getValue();
                $buyer =  $data->getCell('B' . '6')->getValue();
                $po_globalString = str_replace([':', ' ', ','], '', $data->getCell('B' . '7')->getValue());
                $trim = 'Set';
                $po_global = (int)str_replace($trim, '', $po_globalString);
                $admin = session()->get('username');
                $data1 = [
                    'no_model' => $no_model,
                    'no_order' => $no_order,
                    'buyer' => $buyer,
                    'po_global' => $po_global,
                    'admin' => $admin,
                ];

                $existingData = $this->dataPDK->getWhere(['no_model' => $no_model])->getRow();

                if (!$existingData) {
                    $this->dataPDK->insert($data1);
                }
                $startRow = 11; // Ganti dengan nomor baris mulai

                // Loop untuk membaca setiap baris di Excel, dimulai dari baris ke-$startRow
                foreach ($spreadsheet->getActiveSheet()->getRowIterator($startRow) as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);

                    $data = [];
                    foreach ($cellIterator as $cell) {
                        $data[] = $cell->getValue();
                    }
                    $delivery = date_create_from_format('Y-m-d', $data[4]);

                    $data2 = [
                        'no_model' => $no_model,
                        'style' =>  $data[0],
                        'inisial' =>  $data[1],
                        'po_inisial' =>  $data[2],
                        'colour' =>  $data[3],
                        'delivery' => $delivery ? $delivery->format('Y-m-d') : null,
                        'area' =>  $data[5],
                        'admin' => $admin
                    ];
                    //exit();
                    $result = $this->masterInisial->insert($data2);
                    if (!$result) {
                        var_dump($this->masterInisial->errors());
                    }
                }
                return redirect()->to(base_url('/packing'))->with('success', 'Data imported and saved to database successfully');
            } else {
                return redirect()->to(base_url('/packing'))->with('error', 'No data found in the Excel file');
            }
            return redirect()->to(base_url('/packing'))->with('error', 'No data found in the Excel file');
        }
    }

    //flowproses

    public function flowproses()
    {

        $data = [
            'Judul' => 'Input flowproses',
            'User' => session()->get('username'),
            'Header' => 'Input Flow Proses',
            'Proses' => $this->dataProses->findAll(),
            'DB' => $this->masterInisial->findAll(),
            'Data' => $this->masterInisial->getAllDataWithFlowProses(),

        ];
        return view('Packing/flowproses', $data);
    }
    public function getInisialByNoModel()
    {
        $noModel = $this->request->getPost('no_model');
        $inisials = $this->masterInisial->getInisialsByNoModel($noModel);
        return $this->response->setJSON(['inisials' => $inisials]);
    }
    public function getDataByIdInisial()
    {
        $idInisial = $this->request->getPost('id_inisial');
        $data = $this->masterInisial->getDataByIdInisial($idInisial);
        return $this->response->setJSON($data);
    }

    public function inputproses()
    {
        $idInisial = $this->request->getPost('inisial');
        $proses1 = $this->request->getPost('proses1');
        $proses2 = $this->request->getPost('proses2');
        $proses3 = $this->request->getPost('proses3');
        $proses4 = $this->request->getPost('proses4');
        $proses5 = $this->request->getPost('proses5');
        $proses6 = $this->request->getPost('proses6');
        $proses7 = $this->request->getPost('proses7');
        $proses8 = $this->request->getPost('proses8');
        $proses9 = $this->request->getPost('proses9');
        $proses10 = $this->request->getPost('proses10');
        $proses11 = $this->request->getPost('proses11');
        $proses12 = $this->request->getPost('proses12');
        $proses13 = $this->request->getPost('proses13');
        $proses14 = $this->request->getPost('proses14');
        $proses15 = $this->request->getPost('proses15');
        $keterangan = $this->request->getPost('keterangan');

        $data = [
            'id_inisial' => $idInisial,
            'keterangan' => $keterangan,
            'proses_1' => $proses1,
            'proses_2' => $proses2,
            'proses_3' => $proses3,
            'proses_4' => $proses4,
            'proses_5' => $proses5,
            'proses_6' => $proses6,
            'proses_7' => $proses7,
            'proses_8' => $proses8,
            'proses_9' => $proses9,
            'proses_10' => $proses10,
            'proses_11' => $proses11,
            'proses_12' => $proses12,
            'proses_13' => $proses13,
            'proses_14' => $proses14,
            'proses_15' => $proses15,

        ];
        $this->flowModel->insert($data);
        return redirect()->to(base_url('packing/flowproses'))->with('success', 'Data Berhasil Di Input');
    }
    //mesin
    public function mesin()
    {
        $data = [
            'Judul' => 'Data Produksi Mesin',
            'User' => 'Packing',
            'Tabel' => 'Data Produksi Mesin',
            'Produk' => $this->dataModel->paginate(15),
            'pager' => $this->dataModel->pager,
        ];
        return view('Packing/Mesin/mesin', $data);
    }
    public function mesin_update()
    {
        $data = [
            'Judul' => 'Edit Data Mesin',
            'User' => 'Packing',
            'Header' => 'Edit Data Produksi Mesin'
        ];
        return view('Packing/Mesin/editmesin', $data);
    }

    //rosso
    public function rosso()
    {
        $data = [
            'Judul' => 'Data Produksi rosso',
            'User' => 'Packing',
            'Tabel' => 'Data Produksi rosso'
        ];
        return view('Packing/Rosso/rosso', $data);
    }

    //setting
    public function setting()
    {
        $data = [
            'Judul' => 'Data Produksi setting',
            'User' => 'Packing',
            'Tabel' => 'Data Produksi setting'
        ];
        return view('Packing/Setting/setting', $data);
    }


    // packing
    public function packing()
    {
        $data = [
            'Judul' => 'Data Produksi packing',
            'User' => 'Packing',
            'Tabel' => 'Data Produksi packing'
        ];
        return view('Packing/Packing/packing', $data);
    }

    //stoklot
    public function stoklot()
    {
        $data = [
            'Judul' => 'Data stoklot',
            'User' => 'Packing',
            'Tabel' => 'Data  stoklot'
        ];
        return view('Packing/Stoklot/stoklot', $data);
    }
}
