<?php

namespace App\Traits;

use PDF; // Import the PDF class or reference your PDF library.

trait PDFTrait
{
    public function generatePDF($view, $data)
    {
        $pdf = PDF::loadView($view, $data);

        return $pdf;
    }
}
