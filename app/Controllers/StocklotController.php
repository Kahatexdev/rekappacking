<?php

namespace App\Controllers;

use TCPDF;
use App\Controllers\BaseController;

class StocklotController extends BaseController
{
    public function stocklot()
    {
        $dataProduksi = $this->prodModel->getStocklotData();

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
            'Judul' => 'DATA STOCKLOT',
            'User' =>  session()->get('username'),
            'Tabel' => 'Data Inflow Stocklot',
            'Data' => $dataJoined
        ];
        return view('Packing/Stocklot/stocklot', $data);
    }
    public function exportStocklot($selectedIds)
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
        $pdf->Cell(0, 10, 'Export Data Stocklot', 0, 1, 'C');

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
        $nama = 'export Data Stocklot';

        $filePath = $directory . '/' . $nama . '.pdf';
        // Save the PDF to the specified directory
        $pdf->Output($filePath, 'D');
    }
}
