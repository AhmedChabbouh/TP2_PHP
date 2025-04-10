<?php $title="Student Details"; include 'header.php' ?>
<?php
include_once 'classes/autoload.php';
$id = $_GET['id'];
$e = new Etudiant();
$s = new Section();
$etudiant = $e->getEtudiantById($id);


?>
<style>
    .form {

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: fit-content;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ced4da;

    }


</style>
<div class="container-sm">
    <div class="form">
        <div class="alert alert-secondary" role="alert">
            Information sur l'etudiant <?php echo $etudiant->name; ?>
        </div>
        <div>
            <ul class="list-group">
                <li class="list-group-item">
                    <img src="<?php echo $etudiant->image; ?>" alt="Avatar"
                         style="width:150px;height:150px;margin-left :140px;"></li>
                </li>
                <li class="list-group-item">Name: <?php echo $etudiant->name; ?></li>

                <li class="list-group-item">Birthday: <?php echo $etudiant->birthday; ?></li>
                <li class="list-group-item">Section: <?php echo $s->getSectionById($etudiant->section) ?></li>
            </ul>
        </div>
    </div>
    <?php


    ?>
<?php include 'footer.php' ?>