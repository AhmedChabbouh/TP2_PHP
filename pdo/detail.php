
<?php
include_once 'Etudiant.php';
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
            height: fit-content;
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
            Information sur l'etudiant <?php echo $etudiant->name; ?>
        </div>
        <div>
        <ul class="list-group">
        <li class="list-group-item">
            <img src="<?php echo $etudiant->image; ?>" alt="Avatar" style="width:150px;height:150px;margin-left :140px;"></li>
        </li>
  <li class="list-group-item">Name: <?php echo $etudiant->name; ?></li>
  
  <li class="list-group-item">Birthday: <?php echo $etudiant->birthday; ?></li>
  <li class="list-group-item">Section: <?php echo $s->getSectionById($etudiant->section)?></li>
</ul>
        </div>
        </div>
    </body>
</html>
