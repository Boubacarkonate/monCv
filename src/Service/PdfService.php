<?php

namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

 class PdfService                               // je n'arrive upload un fichier pdf
{                                                  //sertvice à utiliser pour facture en pdf

    private $dompdf;

    public function __construct() 
    {
        $this->dompdf = new Dompdf();

        $pdfOptions = new Options();

        $pdfOptions->set('defaultFont', 'Arial');

        $this->dompdf->setOptions($pdfOptions);
    }

    public function showPdfFile($html) {        

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $fichier="document.pdf";
        $this->dompdf->stream( $fichier, [
            'Attachement' => false
        ]);
    }

    public function generateBinaryPDF($html) {

        $this->dompdf->loadHtml($html);
        $this->dompdf->render();
        $this->dompdf->output();
    }

}



