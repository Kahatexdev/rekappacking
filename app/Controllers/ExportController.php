<?php

namespace App\Controllers;

use App\Models\ProductionModel;
use TCPDF;

class ExportController extends BaseController
{
    // public function exportMesin($selectedIds)
    // {
    //     $data = $this->getData($selectedIds);
    //     // Create a new PDF document
    //     $pdf = new TCPDF();

    //     // Set document information
    //     $pdf->SetCreator('RPL Team');
    //     $pdf->SetAuthor('Saha');
    //     $pdf->SetTitle('Export Data Mesin');
    //     $pdf->SetSubject('Data Mesin PDF Export');

    //     // Set margins
    //     $pdf->SetMargins(10, 10, 10);

    //     // Add a page
    //     $pdf->AddPage();

    //     // Set background image
    //     // $backgroundImagePath = FCPATH . 'public/assets/images/bg2.png';
    //     //   $pdf->Image($backgroundImagePath, 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), '', '', '', false, 300, '', false, false, 0);

    //     // Set header
    //     $pdf->setHeaderData('', 0, 'Data Export', 'export Data');

    //     // Set footer
    //     $pdf->setFooterData(['0' => ['text' => 'Page {PAGENO}', 'align' => 'right']], ['0' => ['text' => 'Footer Text']]);

    //     // Set content
    //     $html = '<h1>Data Mesin</h1>';
    //     $html .= '<table border="1">';
    //     $html .= '<tr><th>No Model</th><th>Inisial</th><th>Style</th><th>Colour</th><th>ID Production</th><th>Tanggal Production</th><th>Bagian</th><th>Qty Production</th><th>BS Production</th><th>No Box</th><th>No Label</th><th>Tanggal Upload</th></tr>';

    //     foreach ($data['dataProd'] as $row) {
    //         $html .= '<tr>';
    //         $html .= '<td>' . $row['no_model'] . '</td>';
    //         $html .= '<td>' . $row['inisial'] . '</td>';
    //         $html .= '<td>' . $row['style'] . '</td>';
    //         $html .= '<td>' . $row['colour'] . '</td>';
    //         $html .= '<td>' . $row['id_production'] . '</td>';
    //         $html .= '<td>' . $row['tgl_prod'] . '</td>';
    //         $html .= '<td>' . $row['bagian'] . '</td>';
    //         $html .= '<td>' . $row['qty_prod'] . '</td>';
    //         $html .= '<td>' . $row['bs_prod'] . '</td>';
    //         $html .= '<td>' . $row['no_box'] . '</td>';
    //         $html .= '<td>' . $row['no_label'] . '</td>';
    //         $html .= '<td>' . $row['tgl_upload'] . '</td>';
    //         $html .= '</tr>';
    //     }

    //     $html .= '</table>';
    //     $pdf->writeHTML($html, true, false, true, false, '');

    //     // Output PDF to the browser or save it to a file
    //     $pdf->Output('export_data_mesin.pdf', 'I'); // 'I' to send the file inline to the browser
    // }


    // private function getData($selectedIds)
    // {
    //     $selectedIdsArray = explode(',', $selectedIds);
    //     $dataProd = $this->prodModel->find($selectedIdsArray);
    //     $dataJoined = [];

    //     foreach ($dataProd as $row) {
    //         $kode_shipment = $row['kode_shipment'];
    //         $idInisial = $this->shipment->getIdInisial($kode_shipment);
    //         $dataInisial = $this->masterInisial->where('id_inisial', intval($idInisial['id_inisial']))->first();
    //         $dataJoined[] = [
    //             'no_model'  => $dataInisial['no_model'],
    //             'inisial'   => $dataInisial['inisial'],
    //             'style'     => $dataInisial['style'],
    //             'colour'    => $dataInisial['colour'],
    //             'id_production' => $row['id_production'],
    //             'tgl_prod'  => $row['tgl_prod'],
    //             'bagian'    => $row['bagian'],
    //             'qty_prod'  => $row['qty_prod'],
    //             'bs_prod'   => $row['bs_prod'],
    //             'no_box'    => $row['no_box'],
    //             'no_label'  => $row['no_label'],
    //             'tgl_upload' => $row['created_at'],
    //         ];
    //     }

    //     return [
    //         'dataProd' => $dataJoined,
    //         'judul' => 'export data mesin'
    //     ];
    // }
    function exportMesin($selectedIds)
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

        // Set document properties
        $pdf->SetCreator('RnD Team');
        $pdf->SetAuthor('Notfoundra');
        $pdf->SetTitle('Export Data Produksi ');
        $pdf->SetSubject('Export Data Produksi ');
        $pdf->SetKeywords('Export Data Produksi ');
        $bMargin = $pdf->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $pdf->getAutoPageBreak();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // Add a page
        $pdf->AddPage('L', 'A4');

        // Add header with images on both sides
        $leftImagePath = FCPATH . 'assets/images/kahatex.png'; // Adjust the path to your left image
        $backgroundImg = FCPATH . 'assets/images/bg2.png'; // Adjust the path to your right image
        // Add left image
        $pdf->Image($leftImagePath, 300, 300, 200); // X, Y, Width
        $pdf->Image($backgroundImg, 0, 0, 320, 250, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $pdf->setPageMark();

        // Move to the right for the right image
        $pdf->SetX($pdf->GetPageWidth() - 29);
        // Add right image
        // Center-align the text between the images
        $pdf->SetY(15);
        // Set font
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(0, 10, 'Export Data Produksi Mesin', 0, 1, 'C');
        // Output the HTML content to the PDF

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

        $directory = FCPATH . 'exports/pdf'; // You can change this to your desired directory
        $nama = 'export Data Produksi';
        // Ensure the directory exists, if not, create it
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        // Specify the file path
        $filePath = $directory . '' . $nama . '.pdf';
        // Save the PDF to the specified directory
        $pdf->Output($filePath, 'f');
    }
}
