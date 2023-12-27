<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;

use App\Models\DataModel;
use App\Models\PDKModels;
use App\Models\MasterProses;
use App\Models\MasterInisial;

class PackingController extends BaseController
{
    protected $dataPDK;
    protected $filters;
    protected $dataModel;
    protected $dataProses;
    protected $masterInisial;
    public function __construct()
    {
        $this->dataModel = new DataModel();
        $this->dataPDK = new PDKModels();
        $this->dataProses = new MasterProses();
        $this->masterInisial = new MasterInisial();

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

        ];
        return view('Packing/index', $data);
    }
    public function importPDK()
    {
        $file = $this->request->getFile('excel_file');

        if ($file->isValid() && !$file->hasMoved()) {
            $spreadsheet = IOFactory::load($file);
            $data = $spreadsheet->getActiveSheet();
            $highestRow = $data->getHighestRow();
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

                for ($row = 11; $row <= $highestRow; ++$row) {
                    $style = $data->getCell('A' . $row)->getValue();
                    $inisial = $data->getCell('B' . $row)->getValue();
                    $po_inisial = $data->getCell('C' . $row)->getValue();
                    $colour = $data->getCell('D' . $row)->getValue();
                    $delivery = $data->getCell('H' . $row)->getValue();
                    $area = $data->getCell('F' . $row)->getValue();

                    $data2 = [
                        'no_model' => $no_model,
                        'style' => $style,
                        'inisial' => $inisial,
                        'po_inisial' => $po_inisial,
                        'colour' => $colour,
                        'delivery' => $delivery,
                        'area' => $area
                    ];
                    $this->masterInisial->insert($data2);
                }
                return redirect()->to(base_url('/flowproses'))->with('success', 'Data imported and saved to database successfully');
            } else {
                return redirect()->to(base_url('/packing'))->with('error', 'No data found in the Excel file');
            }
            return redirect()->to(base_url('/packing'))->with('error', 'No data found in the Excel file');
        }
    }

    //flowproses

    public function inputproses()
    {

        $data = [
            'Judul' => 'Input flowproses',
            'User' => session()->get('username'),
            'Header' => 'Input Flow Proses',
            'Proses' => $this->dataProses->findAll(),
            'DB' => $this->masterInisial->findAll(),

        ];
        return view('Packing/flowproses', $data);
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
