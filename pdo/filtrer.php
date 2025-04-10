<?php
require_once 'Etudiant.php';
session_start();
if(!isset($_SESSION['user'])){
    header('Location: login.php');
    exit;
}
try {

    echo 'hello world';
    if (isset($_POST['search'])) {
        $etudiant = new Etudiant();
        $etudiants = $_SESSION['students'];
        $search = trim($_POST['search']);
        echo $_POST['search'];
        $_SESSION['students'] = $etudiant->Filtrer($search);
    } else {
        $etudiants = $_SESSION['students'];
    }
    header("Location: StudentList.php");
    exit;
}
catch (Exception $e){
    echo $e->getMessage();
}