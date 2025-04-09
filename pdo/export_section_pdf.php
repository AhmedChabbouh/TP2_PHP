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
$output = '<strong>Liste des sections</strong><br>';
$output .= '<table border="1" cellspacing="0" cellpadding="5">';
$output .= '<tr>
<th>ID</th>
<th>Designation</th>
<th>Description</th>
</tr>';
if (isset($_SESSION['sections'])) {
    $sections= $_SESSION['sections'];
} else {
    echo "Session expired. Please log in again.";
}
foreach ($sections as $section) :
    $output .= '<tr>';
    $output .= '<td>' . $section->id . '</td>';
    $output .= '<td>' . htmlspecialchars($section->designation) . '</td>';
    $output .= '<td>' . htmlspecialchars($section->description) . '</td>';
    $output .= '</tr>';
endforeach;
$output .= '</table>';
$pdf->writeHTML($output, true, false, true, false);
$pdf->Output('sections.pdf', 'D');
