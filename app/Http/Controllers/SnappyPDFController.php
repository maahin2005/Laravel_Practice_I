<?php

namespace App\Http\Controllers;

use Knp\Snappy\Pdf;

class SnappyPDFController extends Controller
{
    protected $pdf;

    // Inject Pdf service using dependency injection
    public function __construct(Pdf $pdf)
    {
        $this->pdf = $pdf;
    }

    public function getPDF()
    {
        $data = [
            'title' => 'Laravel Snappy PDF Example',
            'content' => 'This is a sample PDF document generated with Laravel Snappy.'
        ];

        // Load the view and generate PDF
        $pdf = PDF::loadView('pdf.sample', $data)
            ->setPaper('a4')
            ->setOption('margin-top', 0)
            ->setOption('margin-bottom', 0);
        // Return the PDF file for download
        return $pdf->download('example.pdf');
    }
}
