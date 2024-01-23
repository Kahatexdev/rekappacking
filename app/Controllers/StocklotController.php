<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StocklotController extends BaseController
{
    public function stocklot()
    {
        $dataProduksi = $this->prodModel->getPotongCorakProduksi();

        $dataJoined = [];
        foreach ($dataProduksi as $row) {

            $kode_shipment = $row['kode_shipment'];
            $idInisial = $this->shipment->getIdInisial($kode_shipment);
            $dataInisial = $this->masterInisial->where('id_inisial', intval($idInisial['id_inisial']))->first();
            $dataJoined[] = [

                'tgl_prod'  => $row['tgl_prod'],
                'no_model'  => $dataInisial['no_model'],
                'inisial'   => $dataInisial['inisial'],
                'style'     => $dataInisial['style'],
                'colour'    => $dataInisial['colour'],
                'id_production' => $row['id_production'],
                'storage_awal'    => $row['storage_awal'],
                'bs_prod'   => $row['bs_prod'],
            ];
        }
        $data = [
            'Judul' => 'Data Produksi PotongCorak',
            'User' =>  session()->get('username'),
            'Tabel' => 'Data Inflow Stocklot',
            'Data' => $dataJoined
        ];
        return view('Packing/Stocklot/stocklot', $data);
    }
}
