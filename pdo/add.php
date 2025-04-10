<?php $title="Add Student"; include 'header.php'; ?>
<?php
try{
include 'classes/autoload.php';
$e = new Etudiant();
$s = new Section();
?>

<style>

    .form{

        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 500px;
        height: max-content;
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
            Donner les informations du nouveau etudiant
        </div>
        <div>
            <form method="POST" enctype="multipart/form-data">
                donnez le nom de l'etudiant :
                <input class="form-control me-2" type="text" name="name">
                <?php
                if (isset($_POST['name']) and $_POST['name'] == "" and isset($_POST['confirm'])) {
                    echo "<div style='color:red'>Tu as oublieé le nom de l'etudiant </div>";
                }
                ?>
                <br>
                donnez la date de naissance de l'etudiant :
                <input class="form-control me-2" type="date" name="birthday">
                <?php
                if (isset($_POST['birthday']) and $_POST['birthday'] == "" and isset($_POST['confirm'])) {
                    echo "<div style='color:red'>Tu as oublieé la date de naissance de l'etudiant </div>";
                }
                ?>
                <br>
                donnez la section de l'etudiant :
                <input class="form-control me-2" type="text" name="section">
                <?php
                if (isset($_POST['section']) && ($s->getSectionId($_POST['section']) == null)) {
                    echo "<div style='color:red'>Section  Invalide!</div>";
                }
                ?>
                <br>
                donner une photo de l'etudiant :
                <input class="form-control me-2" type="file" name="photo">
                <?php
                if (isset($_FILES['photo'])) {
                    if ($_FILES['photo']['size'] == 0 and isset($_POST['confirm'])) {
                        echo "<div style='color:red'>Pas de photo!</div>";
                    } elseif ($_FILES['photo']['type'] != 'image/jpeg' and isset($_POST['confirm'])) {
                        echo "<div style='color:red'>Ce n'est pas une photo!</div>";
                    }
                }
                ?>
                <br>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" name="confirm" class="btn btn-outline-secondary" style="position: absolute;">
                        Valider Les Données
                    </button>
                </div>
                <div style="width:30px;heigth: 30px;"><br><br></div>
            </form>
        </div>
    </div>
    <?php

    if (isset($_POST['confirm']) and $_POST['name'] != "" and $_POST['birthday'] != "" and $_POST['section'] != "" and $_FILES['photo']['size'] != 0 and $_FILES['photo']['type'] == 'image/jpeg') {
        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $_FILES['photo']['name']);

        $e->addEtudiant($_POST['name'], $_POST['birthday'], $s->getSectionId($_POST['section']), 'images/' . $_FILES['photo']['name']);
        header("Location: StudentList.php ");
        exit();
    }
    }
    catch (PDOException $e) {
    }


    ?>
<?php include 'footer.php'; ?>