<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Controllers\BaseController;

class RossoController extends BaseController
{
    public function importProduksiRosso()
    {
        $storage = $this->request->getPost('storage');
        $file = $this->request->getFile('excel_file');
        $noModel = $this->request->getPost('noModel');
        if ($file->isValid() && !$file->hasMoved()) {
            $spreadsheet = IOFactory::load($file);
            $data = $spreadsheet->getActiveSheet();
            $startRow = 18; // Ganti dengan nomor baris mulai
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
                    $validate = ['no_model' => $no_model, 'area' => $area, 'jc' => $jc];
                    if ($data[0] == null) {
                        break;
                    } else {
                        $filterThis = $data[2];
                        $result = $this->dataProses->filterProses($filterThis);
                        if ($result && array_key_exists('kategori', $result)) {
                            $kategori = $result['kategori'];
                            if ($kategori == 'Rosso') {
                                if ($filterThis != $storage) {
                                    return redirect()->to(base_url('/packing/details/' . $noModel))->with('error', 'Storage number ERP tidak sesuai dengan Flow proses. Silahkan Perbaiki terlebih dahulu');
                                } else {
                                    $result = $this->masterInisial->getIdInisial($validate);
                                    if ($result && array_key_exists('id_inisial', $result)) {
                                        $id_inisial = $result['id_inisial'];
                                        // $tglDeliv = $data[31];
                                        // $unixTimeStamp = ($tglDeliv - 25569) * 86400;
                                        // $deliv = date("Y-m-d", $unixTimeStamp);
                                        $validateShipment = [
                                            'inisial' => $id_inisial,
                                        ];
                                        //dibikin foreach untuk getKodeShipment
                                        $kode_shipment = $this->shipment->getKodeShipment($validateShipment);
                                        $kd_shipment = $kode_shipment['kode_shipment'];
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
                                            $qtyerp        = $data[12];
                                            $qty = str_replace('-', '', $qtyerp);
                                            $no_box     = $data[23];
                                            $no_label   = $data[22];
                                            $shift = $data[30];
                                            $admin      = session()->get('username');
                                            $dataInsert = [
                                                'tgl_prod'              => $formated,
                                                'id_proses'             => $idProses,
                                                'bagian'                => $bagian,
                                                'storage_awal'          => $storage1,
                                                'storage_akhir'         => $storage2,
                                                'qty_prod'              => $qty,
                                                'no_box'                => $no_box,
                                                'no_label'              => $no_label,
                                                'admin'                 => $admin,
                                                'kode_shipment'         => intval($kd_shipment),
                                                'shift'                 => $shift
                                            ];
                                            $exististingPDK = $this->prodModel->existingData($dataInsert);
                                            if (!$exististingPDK) {
                                                $this->prodModel->insert($dataInsert);
                                            }
                                        } else {
                                            return redirect()->to(base_url('/packing/details/' . $noModel))->with('error', 'Silahkan input flow proses terlebih dahulu');
                                        }
                                    } else {
                                        return redirect()->to(base_url('/packing/details/' . $noModel))->with('error', 'Silahkan input Master data dan flow proses terlebih dahulu');
                                    }
                                }
                            } else {
                                return redirect()->to(base_url('/packing/details/' . $noModel))->with('error', 'Silahkan input DATA PRODUKSI Rosso (Outflow ROSSO)');
                            }
                        } else {
                            dd('not array found');
                        }
                    }
                }
            }
            return redirect()->to(base_url('/packing/details/' . $noModel))->with('success', 'Data imported and saved to database successfully');
        } else {
            return redirect()->to(base_url('/packing/details/' . $noModel))->with('error', 'No data found in the Excel file');
        }
    }

    //
    public function rosso()
    {
        $dataProduksi = $this->prodModel->getRossoProduksi();

        $dataJoined = [];
        foreach ($dataProduksi as $row) {

            $kode_shipment = $row['kode_shipment'];
            $idInisial = $this->shipment->getIdInisial($kode_shipment);
            $dataInisial = $this->masterInisial->where('id_inisial', intval($idInisial['id_inisial']))->first();
            $dataJoined[] = [

                'no_model'  => $dataInisial['no_model'],
                'inisial'   => $dataInisial['inisial'],
                'style'     => $dataInisial['style'],
                'colour'    => $dataInisial['colour'],
                'id_production' => $row['id_production'],
                'tgl_prod'  => $row['tgl_prod'],
                'bagian'    => $row['bagian'],
                'storage_akhir' => $row['storage_akhir'],
                'qty_prod'  => $row['qty_prod'],
                'bs_prod'   => $row['bs_prod'],
                'no_box'    => $row['no_box'],
                'no_label'  => $row['no_label'],
                'delivery'  => $row['delivery'],
                'tgl_upload' => $row['created_at'],
            ];
        }
        $data = [
            'Judul' => 'Data Produksi rosso',
            'User' =>  session()->get('username'),
            'Tabel' => 'Data Produksi Rosso',
            'Data' => $dataJoined
        ];
        return view('Packing/Rosso/rosso', $data);
    }
}
