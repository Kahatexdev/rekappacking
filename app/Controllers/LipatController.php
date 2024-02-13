<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use TCPDF;
use App\Controllers\BaseController;

class LipatController extends BaseController
{
    public function lipat()
    {
        $dataProduksi = $this->prodModel->getLipatProduksi();

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
            'Judul' => 'Data Produksi Lipat',
            'User' =>  session()->get('username'),
            'Tabel' => 'Data Produksi Lipat',
            'Data' => $dataJoined
        ];

        return view('Packing/Lipat/lipat', $data);
    }

    public function importProduksiLipat()
    {
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

                            if ($kategori == 'Lipat') {
                                $result = $this->masterInisial->getIdInisial($validate);
                                if ($result && array_key_exists('id_inisial', $result)) {
                                    $id_inisial = $result['id_inisial'];
                                    $tglDeliv = $data[31];
                                    $unixTimeStamp = ($tglDeliv - 25569) * 86400;
                                    $deliv = date("Y-m-d", $unixTimeStamp);
                                    $validateShipment = [
                                        'inisial' => $id_inisial,
                                        'delivery' => $deliv
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
                                        $shift = $data[30];
                                        $no_box     = $data[23];
                                        $no_label   = $data[22];
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
                            } else {
                                return redirect()->to(base_url('/packing/details/' . $noModel))->with('error', 'Silahkan input DATA PRODUKSI lipat (Outflow lipat)');
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
    public function exportLipat($selectedIds)
    {

        $pdf = new TCPDF();
        $style = array(
            'border' => false,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );

        $pdf->SetCreator('RnD Team');
        $pdf->SetAuthor('Notfoundra');
        $pdf->SetTitle('Export Data Produksi ');
        $pdf->SetSubject('Export Data Produksi ');
        $pdf->SetKeywords('Export Data Produksi ');
        $bMargin = $pdf->getBreakMargin();
        $auto_page_break = $pdf->getAutoPageBreak();
        $pdf->SetAutoPageBreak(false, 0);
        $pdf->AddPage('L', 'A4');

        $leftImagePath = FCPATH . 'assets/images/kahatex.png'; // Adjust the path to your left image
        $backgroundImg = FCPATH . 'assets/images/bg2.png'; // Adjust the path to your right image
        $pdf->Image($leftImagePath, 300, 300, 200); // X, Y, Width
        $pdf->Image($backgroundImg, 0, 0, 320, 250, '', '', '', false, 300, '', false, false, 0);
        $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
        $pdf->setPageMark();

        $pdf->SetX($pdf->GetPageWidth() - 29);
        $pdf->SetY(15);
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(0, 10, 'Export Data Produksi Lipat', 0, 1, 'C');

        $pdf->SetFont('times', 'B', 10);
        $admin = session()->get('username');
        $pdf->Cell(0, 10, 'Admin : ' . $admin, 0, 1, 'L');
        // HTML table
        $pdf->SetFont(
            'times',
            'B',
            9
        );
        $html = '<table border="1" style="width:100%; text-align:center">';
        $html .= '<tr>
                        <th>Tanggal Produksi</th>
                        <th>Bagian</th>
                        <th>Storage Akhir</th>
                        <th>PDK</th>
                        <th>Inisial</th>
                        <th>Style</th>
                        <th>Colour</th>
                        <th>Qty Prod</th>
                        <th>BS Prod</th>
                        <th>No Box</th>
                    </tr>';
        // Output the HTML content to the PDF
        // Fetch data from your database and populate the table
        $selectedIdsArray = explode(',', $selectedIds);
        $dataProd = $this->prodModel->find($selectedIdsArray);

        foreach ($dataProd as $row) {
            $kode_shipment = $row['kode_shipment'];
            $idInisial = $this->shipment->getIdInisial($kode_shipment);
            $dataInisial = $this->masterInisial->where('id_inisial', intval($idInisial['id_inisial']))->first();

            $html .= '<tr>';
            $html .= '<td>' . $row['tgl_prod'] . '</td>';
            $html .= '<td>' . $row['bagian'] . '</td>';
            $html .= '<td>' . $row['storage_akhir'] . '</td>';
            $html .= '<td>' . $dataInisial['no_model'] . '</td>';
            $html .= '<td>' . $dataInisial['inisial'] . '</td>';
            $html .= '<td>' . $dataInisial['style'] . '</td>';
            $html .= '<td>' . $dataInisial['colour'] . '</td>';
            $html .= '<td>' . $row['qty_prod'] . '</td>';
            $html .= '<td>' . $row['bs_prod'] . '</td>';
            $html .= '<td>' . $row['no_box'] . '</td>';
            $html .= '<td>' . $row['no_label'] . '</td>';
            $html .= '</tr>';
        }

        $html .= '</table>';
        // Output the HTML content to the PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        $directory = WRITEPATH . 'exports/rosso'; // You can change this to your desired directory
        $nama = 'export Data Produksi Lipat';

        $filePath = $directory . '/' . $nama . '.pdf';
        // Save the PDF to the specified directory
        $pdf->Output($filePath, 'D');
    }
}
