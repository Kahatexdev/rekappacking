<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DataModel;
use App\Models\PDKModels;
use App\Models\FlowModels;
use App\Models\MasterProses;
use App\Models\ShipmentModel;
use App\Models\MasterInisial;
use App\Models\ProductionModel;
use App\Models\PerjalananModel;

class PerjalananController extends BaseController
{
    protected $filters;
    protected $dataPDK;
    protected $dataModel;
    protected $dataProses;
    protected $masterInisial;
    protected $shipment;
    protected $flowModel;
    protected $prodModel;
    protected $jalanModel;
    public function __construct()
    {
        $this->dataModel     = new DataModel();
        $this->dataPDK       = new PDKModels();
        $this->dataProses    = new MasterProses();
        $this->masterInisial = new MasterInisial();
        $this->flowModel     = new FlowModels();
        $this->shipment      = new ShipmentModel();
        $this->prodModel     = new ProductionModel();
        $this->jalanModel     = new PerjalananModel();

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
            $no_model = $dp['no_model'];


            $dataJoined[] = [
                'no_model' => $no_model
            ];
        }

        $data = [
            'inidata' => $dataJoined,
            'Tabel'  => "Tabel Data Perjalanan",
            'Judul'  => "Rekapan Packing",
            'User'   => session()->get('username'),
        ];
        return view('Packing/Perjalanan/index', $data);
    }
    public function detailperjalanan($idInisial)
    {
        $dataInisial = $this->masterInisial->where('id_inisial', $idInisial)->findAll();
        $header = [];

        foreach ($dataInisial as $val) {
            $id_proses = $this->flowModel->getIdProses($val['id_inisial']);
            if ($id_proses && array_key_exists('id_proses', $id_proses)) {
                $idProses = $id_proses['id_proses'];
                $style = $val['style'];
                $warna = $val['colour'];
                $noModel = $val['no_model'];
                $h1 = $this->dataProses->filterProses($id_proses['proses_1'])["kategori"];
                $h2 = $this->dataProses->filterProses($id_proses['proses_2'])["kategori"];
                $h3 = $this->dataProses->filterProses($id_proses['proses_3'])["kategori"];
                $h4 = $this->dataProses->filterProses($id_proses['proses_4'])["kategori"];

                $dataProd = $this->prodModel->getDataByProses($idProses);
                if ($dataProd && array_key_exists('id_production', $dataProd)) {
                    $noBox = $dataProd['no_box'];
                    $noLabel = $dataProd['no_label'];
                    $validate = [
                        'noBox' => $noBox,
                        'noLabel' => $noLabel,
                        'idProses' => $idProses
                    ];
                    $mesin = $this->jalanModel->getDataMesin($validate);
                    $rosso = $this->jalanModel->getDataRosso($validate);
                    $setting = $this->jalanModel->getDataSetting($validate);
                    $gudang = $this->jalanModel->getDataGudang($validate);
                    $sisaRosso = $mesin - $rosso;
                    $sisaSetting = $rosso - $setting;
                    $sisaGudang = $setting - $gudang;
                    $dataProduksi[] = [
                        'no_box' => $noBox,
                        'no_label' => $dataProd['no_label'],
                        'mesin' => $mesin,
                        'rosso' => $sisaRosso,
                        'gudang' => $sisaGudang,
                        'setting' => $sisaSetting
                    ];
                }
            }

            $header = [
                $h1,
                $h2,
                $h3,
                $h4,
            ];
        }
        $data = [
            'Judul' => 'Data Perjalanan' . $noModel,
            'User' => session()->get('username'),
            'noModel' => $noModel,
            'style' => $style,
            'warna' => $warna,
            'header' => $header,
            'dataProd' => $dataProduksi,
        ];

        return view('Packing/Perjalanan/detail', $data);
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
