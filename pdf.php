<?php

require_once  __DIR__ . DIRECTORY_SEPARATOR . 'pdf' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
include_once 'VarStream.php';

$varInAnyScope = 'sample.pdf';
$base64 = file_get_contents("pdf_base64.txt");
$base64_decoded = base64_decode($base64);
$stream = VarStream::createReference($base64_decoded);

$mpdf = new \Mpdf\Mpdf();
$pagecount = $mpdf->setSourceFile($stream);
$tplId = $mpdf->ImportPage($pagecount);
$mpdf->UseTemplate($tplId);

$mpdf->WriteHTML('Hello World');
$mpdf->Output();