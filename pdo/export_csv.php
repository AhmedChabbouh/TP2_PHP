<?php
require 'vendor/autoload.php';
use League\Csv\Writer;
// Export to CSV
$csv = Writer::createFromFileObject(new SplTempFileObject());
$csv->setEscape('');
$csv->insertOne(['ID', 'Nom', 'Birthday', 'Section']);
if (isset($_SESSION['students'])) {
    $students = $_SESSION['students'];
} else {

}
foreach ($students as $student) :
    $csv->insertOne([$student['id'], $student['name'], $student['birthday'], $student['section']]);
endforeach;

$csv->download('students.csv');
exit;
