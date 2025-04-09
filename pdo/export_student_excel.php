<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if (isset($_SESSION['students'])) {
    $students = $_SESSION['students'];
} else {
    echo "problem";
}
$spreadsheet = new Spreadsheet();
$activeSheet = $spreadsheet->getActiveSheet();
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="students.xlsx"');
header('Cache-Control: max-age=0');
$activeSheet->setCellValue('A1', 'ID');
$activeSheet->setCellValue('B1', 'Nom');
$activeSheet->setCellValue('C1', 'Birthday');
$activeSheet->setCellValue('D1', 'Section');
foreach ($students as $student) {
    $activeSheet->setCellValue('A' . ($student->id + 1), $student->id);
    $activeSheet->setCellValue('B' . ($student->id + 1), htmlspecialchars($student->name));
    $activeSheet->setCellValue('C' . ($student->id + 1), htmlspecialchars($student->birthday));
    $activeSheet->setCellValue('D' . ($student->id + 1), htmlspecialchars($student->section));
}
try {
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');

}catch (Exception $e){
    echo $e->getMessage();
}
