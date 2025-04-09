<?php
try{
include 'Etudiant.php';
$id=$_GET['id'];
$e=new Etudiant();
$s=new Section(); 
$etudiant = $e->getEtudiantById($id);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

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
    </head>
    <title>Student Details</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-body"  data-bs-theme="dark" >
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Student management System</a>
      
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="home.html">Home</a>
          <a class="nav-link" href="StudentList.php">Liste des Etudiants</a>
          <a class="nav-link" href="SectionList.php">Liste des Sections</a>
          <a class="nav-link" href="">Logout</a>
        </div>
      </div>
    </div>
  </nav>
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
            $_POST['section']=$e->getSectionId($etudiant->section);}
            ?>
            <br>
            donner une photo de l'etudiant :
            <input class="form-control me-2" type="file" name="photo"  >    
            <?php
            if(isset($_FILES['photo']))
              {
                if($_FILES['photo']['type']!='image/jpeg'  and isset($_POST['change']) ){
                    echo "<div style='color:red'>Ce n'est pas une photo!</div>";}
              elseif($_FILES['photo']['size']==0 and isset($_POST['change']) ){
                $_FILES['photo']['name']=$etudiant->image;
              }
           }
            ?>
            <br>
            <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" name="confirm" class="btn btn-outline-secondary" style="position: absolute;">Valider Les Données</button>
            </div>
            <div style="width:30px;heigth: 30px;"><br><br></div>
        </form>
        </div>
        </div>
        <?php

if(isset($_POST['change'])   and $_FILES['photo']['type']=='image/jpeg')
{
    move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$_FILES['photo']['name']);
    
    $e->updateEtudiant($_POST['name'],$_POST['birthday'],$id,$s->getSectionId($_POST['section']),'images/'.$_FILES['photo']['name']);
    header("Location: StudentList.php ");
    exit();
}
}
catch(PDOException $e){
}


?>
    </body>
</html>
