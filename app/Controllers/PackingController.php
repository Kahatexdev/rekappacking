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

            if (!empty($data)) {
                $no_model = str_replace([':', ' '], '', $data->getCell('B' . '9')->getValue());
                $no_order =  str_replace([':', ' '], '', $data->getCell('B' . '5')->getValue());
                $buyer = str_replace([':', ' '], '', $data->getCell('B' . '6')->getValue());
                $po_globalString = str_replace([':', ' ', ','], '', $data->getCell('D' . '6')->getValue());
                $trim = 'Set';
                $po_global = (int)str_replace($trim, '', $po_globalString) * 2;
                $admin = session()->get('username');

                // Simpan ke database
                //   var_dump($data);
                $data = ['no_model' => $no_model, 'no_order' => $no_order, 'buyer' => $buyer, 'po_global' => $po_global, 'admin' => $admin];
                $this->dataPDK->insert($data);
            }
            //var_dump($data);

            return redirect()->to(base_url('/packing'))->with('success', 'Data imported and saved to database successfully');
        } else {
            // return redirect()->to('mesin/data')->with('error', 'No data found in the Excel file');
        }
    }

    // return redirect()->to('/packing')->with('error', 'Invalid file or file not uploaded');

    //flowproses
    public function flow()
    {

        $data = [
            'Judul' => 'Input Data Master',
            'User' => session()->get('username'),
            'Header' => 'Input Flow Proses',
            'Proses' => $this->dataProses->findAll(),
            'NoModel' => $this->dataPDK->findAll(),

        ];
        return view('Packing/Flow/inputmaster', $data);
    }
    public function inputproses()
    {

        $data = [
            'Judul' => 'Input flowproses',
            'User' => session()->get('username'),
            'Header' => 'Input Flow Proses',
            'Proses' => $this->dataProses->findAll()

        ];
        return view('Packing/Flow/flowproses', $data);
    }

    public function importinisial()
    {
        $file = $this->request->getFile('excel_file');
        $area = $this->request->getVar('area');
        $no_model = $this->request->getPost('no_model');
        if ($file->isValid() && !$file->hasMoved()) {
            $spreadsheet = IOFactory::load($file);
            $data = $spreadsheet->getActiveSheet()->toArray();

            // Ensure there is data to insert
            if (!empty($data)) {

                foreach ($data as $x => $row) {
                    if ($x == 0) {
                        continue;
                    }
                    // $no_model = $row[0];
                    $style = $row[1];
                    $inisial = $row[2];
                    $po_inisial = $row[3];
                    $colour = $row[4];
                    $delivery = $row[5];

                    if (!empty($row)) {
                        // Simpan ke database
                        //var_dump($data);
                        $data = ['no_model' => $no_model, 'style' => $style, 'colour' => $colour, 'inisial' => $inisial, 'po_inisial' => $po_inisial, 'delivery' => $delivery, 'area' => $area, 'admin' => session()->get('username')];


                        $this->masterInisial->insert($data);
                    }
                }
                // var_dump($data);

                return redirect()->to('packing/flowproses')->with('success', 'Data imported and saved to database successfully');
            } else {
                return redirect()->to('packing/inputmasterflow')->with('error', 'No data found in the Excel file');
            }
        }
        //var_dump($data);

        return redirect()->to('packing/inputmasterflow')->with('error', 'Invalid file or file not uploaded');
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
