<?php

require_once 'vendor/autoload.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetFont('dejavusans', '', 10);
$pdf->AddPage();
$output = '<strong>Liste des étudiants</strong><br>';
$output .= '<table border="1" cellspacing="0" cellpadding="5">';
$output .= '<tr>
<th>ID</th>
<th>Nom</th>
<th>Birthday</th>
<th>Section</th>
</tr>';
if (isset($_SESSION['students'])) {
    $students = $_SESSION['students'];
} else {
    echo "Session expired. Please log in again.";
}
foreach ($students as $student) :
    $output .= '<tr>';
    $output .= '<td>' . $student->id . '</td>';
    $output .= '<td>' . htmlspecialchars($student->name) . '</td>';
    $output .= '<td>' . htmlspecialchars($student->birthday) . '</td>';
    $output .= '<td>' . htmlspecialchars($student->section) . '</td>';
    $output .= '</tr>';
endforeach;
$output .= '</table>';
$pdf->writeHTML($output, true, false, true, false);
$pdf->Output('students.pdf', 'D');