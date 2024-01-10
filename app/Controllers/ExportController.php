<?php

namespace App\Controllers;

use App\Models\ProductionModel;
use Mpdf\Mpdf;

class ExportController extends BaseController
{
    protected $prodModel;
    public function __construct()
    {
        $this->prodModel = new ProductionModel();
    }

    public function exportMesin($selectedIds)
    {
        $selectedIdsArray = explode(',', $selectedIds);
        $dataProd = $this->prodModel->find($selectedIdsArray);
        $mpdf = new Mpdf();


        $html = view('Packing/Exported/exportMesin', ['productionData' => $dataProd]);

        // Add background image
        $backgroundImage = 'public\assets\images\BG.png';
        $html = '<div style="background-image: url(\'' . $backgroundImage . '\'); background-size: cover;">' . $html . '</div>';

        // Write PDF content
        $mpdf->WriteHTML($html);

        // Output PDF to browser
        $mpdf->Output('exported_pdf.pdf', 'I');
        return redirect()->to(base_url('/packing/datamesin'));
    }
}
