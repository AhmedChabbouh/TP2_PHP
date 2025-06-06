<?php
require 'vendor/autoload.php';
use League\Csv\Writer;
// Export to CSV
session_start();
if(!isset($_SESSION['user'])){
    header('Location: login.php');
    exit;
}
    $csv = Writer::createFromFileObject(new SplTempFileObject());
    $csv->setEscape('');
    $csv->insertOne(['ID', 'Nom', 'Birthday', 'Section']);
    if (isset($_SESSION['students'])) {
        $students = $_SESSION['students'];
    }
    else {
        exit;
    }
    foreach ($students as $student) {
        $csv->insertOne([$student->id, $student->name, $student->birthday, $student->section]);
    }

    $csv->download('students.csv');
    exit;