<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if (isset($_SESSION['sections'])) {
    $sections = $_SESSION['sections'];
} else {
    echo "problem";
}
$spreadsheet = new Spreadsheet();
$activeSheet = $spreadsheet->getActiveSheet();
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="sections.xlsx"');
header('Cache-Control: max-age=0');
$activeSheet->setCellValue('A1', 'ID');
$activeSheet->setCellValue('B1', 'Designation');
$activeSheet->setCellValue('C1', 'Description');
foreach ($sections as $section) {
    $activeSheet->setCellValue('A' . ($section->id + 1), $section->id);
    $activeSheet->setCellValue('B' . ($section->id + 1), htmlspecialchars($section->designation));
    $activeSheet->setCellValue('C' . ($section->id + 1), htmlspecialchars($section->description));
}
try {
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');

}catch (Exception $e){
    echo $e->getMessage();
}
