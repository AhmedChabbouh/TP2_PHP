<?php
require 'vendor/autoload.php';
use League\Csv\Writer;
session_start();
if(!isset($_SESSION['user'])){
    header('Location: login.php');
    exit;
}
$csv = Writer::createFromFileObject(new SplTempFileObject());
$csv->setEscape('');
$csv->insertOne(['ID', "Designation","Description"]);
if (isset($_SESSION['sections'])) {
    $sections = $_SESSION['sections'];
}
else {
    exit;
}
foreach ($sections as $section) {
    $csv->insertOne([$section->id, $section->designation, $section->description]);
}
$csv->download('sections.csv');
exit;
