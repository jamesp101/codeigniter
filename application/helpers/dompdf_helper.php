<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'third_party/dompdf/autoload.inc.php');
use Dompdf\Dompdf;



function pdf_create($html, $filename = '', $download = true) {
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Set the Content-Disposition based on download parameter
    if ($download) {
        $dompdf->stream($filename . ".pdf", array("Attachment" => true));
    } else {
        // Inline display
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '.pdf"');
        echo $dompdf->output();
    }
}
?>