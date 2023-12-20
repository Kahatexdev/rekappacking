<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\DataModel;

class MesinController extends BaseController
{
    protected $filters;
    protected $dataModel;

    public function __construct()
    {
        $this->dataModel = new DataModel();;
        $this->filters = ['role' => ['mesin']];
        $this->isLogedin();
    }
    protected function isLogedin()
    {
        if (!session()->get('user_id')) {
            return redirect()->to(base_url('/login'));
        }
    }
    // user mesin
    public function mesin_index(): string
    {
        // $dataBarang = $this->dataModel->findAll();
        $data = [
            'Judul' => 'Data Mesin',
            'User' => session()->get('role')
        ];

        return view('User/Mesin/index', $data);
    }
    public function mesindata(): string
    {
        $data = [
            'Judul' => 'Data Mesin',
            'User' => session()->get('role'),
            'Produk' => $this->dataModel->findAll()
        ];


        return view('User/Mesin/dataproduksi', $data);
    }

    public function import()
    {
        $file = $this->request->getFile('excel_file');

        if ($file->isValid() && !$file->hasMoved()) {
            $spreadsheet = IOFactory::load($file);
            $data = $spreadsheet->getActiveSheet()->toArray();

            // Ensure there is data to insert
            if (!empty($data)) {

                foreach ($data as $x => $row) {
                    if ($x == 0) {
                        continue;
                    }
                    $jc = $row[0];
                    $inisial = $row[1];
                    $colour = $row[2];
                    $deskripsi = $row[3];
                    $admin = $row[4];
                    if (!empty($row)) {
                        // Simpan ke database
                        //var_dump($data);
                        $bismillah = ['jc' => $jc, 'inisial' => $inisial, 'colour' => $colour, 'deskripsi' => $deskripsi, 'admin' => $admin];
                        $this->dataModel->insert($bismillah);
                    }
                }
                // var_dump($data);

                return redirect()->to('mesin/data')->with('success', 'Data imported and saved to database successfully');
            } else {
                return redirect()->to('mesin/data')->with('error', 'No data found in the Excel file');
            }
        }
        //var_dump($data);

        return redirect()->to('mesin')->with('error', 'Invalid file or file not uploaded');
    }
    public function getData()
    {
        $model = new DataModel();
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'];

        $data = [
            'draw' => $draw,
            'recordsTotal' => $model->countAll(),
            'recordsFiltered' => $model->searchCount($search),
            'data' => $model->search($search, $start, $length),
        ];

        return $this->response->setJSON($data);
    }
}
