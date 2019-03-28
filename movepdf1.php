<?php
//mpdf.php
include 'vendor/autoload.php';
use pdf_context; //mPDF ได้มาจาก key index ใน autoload_classmap.php

$mpdf = new \Mpdf\Mpdf();

$mpdf->WriteHTML('
    Hallo World
');
$mpdf->Output();