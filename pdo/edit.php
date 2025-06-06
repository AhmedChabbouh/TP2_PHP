<?php $title="Student Details"; include 'header.php'; ?>

<?php
try{
include 'classes/autoload.php';
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
            Modifier les informations de l'etudiant <?php echo $etudiant->name; ?><br>
            Laissez Vide Les informations que tu ne veux pas changer
        </div>
        <div>
        <form method="POST" enctype="multipart/form-data">
            donnez le  nom de l'etudiant :
            <input class="form-control me-2" type="text" name="name"  >
            <?php
            if(isset($_POST['name'])and $_POST['name']=="" and isset($_POST['change']) ){
                $_POST['name']=$etudiant->name;
           }
            ?>
            <br>
            donnez la date de naissance de l'etudiant :
            <input class="form-control me-2" type="date" name="birthday"  >
            <?php
            if(isset($_POST['birthday'])and $_POST['birthday']=="" and isset($_POST['change']) ){
                $_POST['birthday']=$etudiant->birthday;
           }
            ?>
            <br>
            donnez la section de l'etudiant :
            <input class="form-control me-2" type="text" name="section" >
            <?php
            if(isset($_POST['section'])&&($_POST['section']!="")&&($s->getSectionId($_POST['section']) == null)){
              echo "<div style='color:red'>Section  Invalide!</div>";
           }
           elseif(isset($_POST['section'])and $_POST['section']=="" and isset($_POST['change']) ){
            $_POST['section']=$s->getSectionById($etudiant->section);}
            ?>
            <br>
            donner une photo de l'etudiant :
            <input class="form-control me-2" type="file" name="photo"  >
            <?php
            if(isset($_FILES['photo']))
              {
                $d='images/'.$_FILES['photo']['name'];
                if($_FILES['photo']['size']!=0 and $_FILES['photo']['type']!='image/jpeg'  and isset($_POST['change']) ){
                    echo "<div style='color:red'>Ce n'est pas une photo!</div>";}
              elseif($_FILES['photo']['size']==0 and isset($_POST['change']) ){
                $d=$etudiant->image;
              }
           }
            ?>
            <br>
            <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" name="change" class="btn btn-outline-secondary" style="position: absolute;">Valider Les Données</button>
            </div>
            <div style="width:30px;heigth: 30px;"><br><br></div>
        </form>
        </div>
        </div>
        <?php

if(isset($_POST['change']) && ($_FILES['photo']['type']=='image/jpeg' or $_FILES['photo']['size']==0))
{
    move_uploaded_file($_FILES['photo']['tmp_name'], $d);
    $e->updateEtudiant($_POST['name'],$_POST['birthday'],$s->getSectionId($_POST['section']),$id,$d);
    header("Location: StudentList.php ");
    exit();

}
}
catch(PDOException $e){
}


    ?>

    <?php include 'footer.php'; ?>

