<?php

namespace App\Controllers;

use App\Models\DataModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends BaseController
{
    public function export()
    {
        $selectedIds = $this->request->getPost('selected');

        if (!$selectedIds) {
            return redirect()->to('mesin/data');
        }

        $model = new DataModel();
        $data = $model->find($selectedIds);

        // Buat objek Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tambahkan header
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'JC');
        $sheet->setCellValue('C1', 'Inisial');
        $sheet->setCellValue('D1', 'Colour');
        $sheet->setCellValue('E1', 'Deskripsi');
        $sheet->setCellValue('F1', 'Admin');
        // Tambahkan kolom lainnya sesuai kebutuhan

        // Tambahkan data
        $row = 2;
        foreach ($data as $dt) {
            $sheet->setCellValue('A' . $row, $dt['id']);
            $sheet->setCellValue('B' . $row, $dt['jc']);
            $sheet->setCellValue('C' . $row, $dt['inisial']);
            $sheet->setCellValue('D' . $row, $dt['colour']);
            $sheet->setCellValue('E' . $row, $dt['deskripsi']);
            $sheet->setCellValue('F' . $row, $dt['admin']);
            // Tambahkan kolom lainnya sesuai kebutuhan
            $row++;
        }

        // Simpan ke file Excel
        $filename = 'DataExport_RekapPacking' . date('YmdHis') . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        // Set header untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        readfile($filename);

        // Hapus file setelah di-download
        unlink($filename);
        exit();
    }
}
