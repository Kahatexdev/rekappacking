<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use PhpOffice\PhpSpreadsheet\IOFactory;

use App\Models\DataModel;
use App\Models\PDKModels;
use App\Models\FlowModels;
use App\Models\MasterProses;
use App\Models\ShipmentModel;
use App\Models\MasterInisial;
use App\Models\ProductionModel;
use DateTime;
use PhpParser\Node\Stmt\Echo_;
use PHPUnit\Framework\Test;

class PackingController extends BaseController
{
    protected $dataPDK;
    protected $filters;
    protected $dataModel;
    protected $dataProses;
    protected $masterInisial;
    protected $shipment;
    protected $flowModel;
    protected $prodModel;
    public function __construct()
    {
        $this->dataModel = new DataModel();
        $this->dataPDK = new PDKModels();
        $this->dataProses = new MasterProses();
        $this->masterInisial = new MasterInisial();
        $this->flowModel = new FlowModels();
        $this->shipment = new ShipmentModel();
        $this->prodModel = new ProductionModel();
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
                $startRow = 11; // Ganti dengan nomor baris mulai
                foreach ($spreadsheet->getActiveSheet()->getRowIterator($startRow) as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);

                    $data = [];
                    foreach ($cellIterator as $cell) {
                        $data[] = $cell->getValue();
                    }
                    $no_model = $data[3];
                    $no_order =  $data[2];
                    $buyer = $data[1];
                    $po_global = $data[7];
                    $admin = session()->get('username');
                    $data1 = [
                        'no_model' => $no_model,
                        'no_order' => $no_order,
                        'buyer' => $buyer,
                        'po_global' => $po_global,
                        'admin' => $admin,
                    ];

                    $exististingPDK = $this->dataPDK->getWhere(['no_model' => $no_model])->getRow();

                    if (!$exististingPDK) {
                        $this->dataPDK->insert($data1);
                    }

                    // Loop untuk membaca setiap baris di Excel, dimulai dari baris ke-$startRow

                    $inisial = $data[4];
                    $data2 = [
                        'no_model' => $no_model,
                        'style' =>  $data[5],
                        'inisial' =>  $inisial,
                        'po_inisial' =>  $data[8],
                        'colour' =>  $data[6],
                        'area' =>  $data[10],
                        'admin' => $admin
                    ];
                    $existingInisial = $this->masterInisial->getWhere(['inisial' => $inisial])->getRow();
                    if (!$existingInisial) {
                        $this->masterInisial->insert($data2);
                    }
                    $dataInisial = $this->masterInisial->findAll();
                    foreach ($dataInisial as $di) {
                        $idInisial = $di['id_inisial'];
                    }
                    $data3 = [
                        'id_inisial' => $idInisial,
                        'delivery' => $data[0],
                        'po_shipment' => $data[9],
                        'admin' => $admin
                    ];
                    //dd($data3);

                    $this->shipment->insert($data3);
                }
                // dd($data3);
                // exit();

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
    // input produksi
    public function importProduksi()
    {
        $file = $this->request->getFile('excel_file');

        if ($file->isValid() && !$file->hasMoved()) {
            $spreadsheet = IOFactory::load($file);
            $data = $spreadsheet->getActiveSheet();
            $startRow = 18; // Ganti dengan nomor baris mulai
            // Loop untuk membaca setiap baris di Excel, dimulai dari baris ke-$startRow
            foreach ($spreadsheet->getActiveSheet()->getRowIterator($startRow) as $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                $data = [];
                foreach ($cellIterator as $cell) {
                    $data[] = $cell->getValue();
                }

                if (!empty($data)) {
                    // validate this :
                    $no_model = $data[21];
                    $area = $data[26];
                    $jc = $data[4];

                    $validate = [
                        'no_model' => $no_model,
                        'area' => $area,
                        'jc' => $jc
                    ];
                    $result = $this->masterInisial->getIdInisial($validate);

                    if ($result && array_key_exists('id_inisial', $result)) {
                        $id_inisial = $result['id_inisial'];

                        $id_proses = $this->flowModel->getIdProses($id_inisial);

                        if ($id_proses && array_key_exists('id_proses', $id_proses)) {
                            $idProses   = $id_proses['id_proses'];
                            $tglProd    = $data[1];
                            $strReplace = str_replace('.', '-', $tglProd);
                            $dateTime   = \DateTime::createFromFormat('d-m-Y', $strReplace);
                            $formated   = $dateTime->format('Y-m-d');
                            $bagian     = $data[2];
                            $storage1   = $data[2];
                            $storage2   = $data[10];
                            $qty        = $data[12];
                            $no_box     = $data[23];
                            $no_label   = $data[22];
                            $admin      = session()->get('username');

                            $dataInsert = [
                                'tgl_prod'      => $formated,
                                'id_proses'     => $idProses,
                                'bagian'        => $bagian,
                                'storage_awal'  => $storage1,
                                'storage_akhir' => $storage2,
                                'qty_prod'      => $qty,
                                'no_box'        => $no_box,
                                'no_label'      => $no_label,
                                'admin'         => $admin
                            ];
                            $this->prodModel->insert($dataInsert);
                        } else {
                            return redirect()->to(base_url('/packing/datamesin'))->with('error', 'Silahkan input flow proses terlebih dahulu');
                        }
                    } else {
                        return redirect()->to(base_url('/packing/datamesin'))->with('error', 'Silahkan input Master data dan flow proses terlebih dahulu');
                    }
                }
            }

            return redirect()->to(base_url('/packing/datamesin'))->with('success', 'Data imported and saved to database successfully');
        } else {
            return redirect()->to(base_url('/packing/datamesin'))->with('error', 'No data found in the Excel file');
        }
    }


    //mesin
    public function mesin()
    {
        $data = [
            'Judul' => 'Data Produksi Mesin',
            'User'  => session()->get('username'),
            'Tabel' => 'Data Produksi Mesin',

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
            'User'   => 'Packing',
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
