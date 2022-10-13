<?php 
require_once ('process_pdf.php');
require_once ('upload_pdf.php');

$tmp_dir = sys_get_temp_dir(). '/';
$uploaded_pdf = new UploadPDF($tmp_dir,$_POST["submit"],$_FILES["pdf"]);
$uploaded_qr = new UploadImage($tmp_dir,$_POST["submit"], $_FILES["qrcode"]);
$allowed_types_image = array('.jpg', '.jpeg', '.png');
$uploaded_qr->setAllowed_types($allowed_types_image);
$name_of_file_pdf = $uploaded_pdf->getFilename();
$filename = $uploaded_pdf->useUploadedFile();
$qr_file = $uploaded_qr->useUploadedFile();
$name_of_file_pdf =  substr($name_of_file_pdf, 0, strrpos($name_of_file_pdf, "."));
$output_name = $name_of_file_pdf . '_qr-code';
$pdf = new ProcessPDF($filename,$qr_file,1,$output_name);
$pdf->handle();
?>