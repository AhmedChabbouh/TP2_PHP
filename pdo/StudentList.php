
<?php
            require_once 'Etudiant.php';
            $etudiant = new Etudiant();
            $etudiants=$etudiant->ListeEtudiant();
            for($j=0;$j<count($etudiants);$j++)
            {
              
              if(isset($_POST['detail'.$j])) {
                header("Location: detail.php?id=".$etudiants[$j]->id);
                
              exit();
            }
                if(isset($_POST['delete'.$j])) {
                    $etudiant->deleteEtudiant($etudiants[$j]->id);
                    header("Location: StudentList.php");
                    
                  }
                 
                 if (isset($_POST['edit'.$j])) {
                  echo $j;
                  header("Location: edit.php?id=".$etudiants[$j]->id);
                  exit();}

                 }
            if(isset($_POST['add'])) {
                header("Location: add.php");
                exit();
            }
            
            ?>
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Student Management System</title>

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
<div class="alert alert-secondary" role="alert">
  Liste des etudiants
</div>
      <form class="d-flex" role="search" method="POST">
        <input class="form-control me-2" type="search" style="width:400px;" aria-label="Search">
        <div style="width:5px; "></div>
        <button   class="btn btn-outline-secondary" type="submit">Filtrer</button>
        <button type='submit' name='add' class='btn btn-link'>
                    <img src='https://cdn-icons-png.flaticon.com/512/9977/9977366.png' alt='add' width='30' height='30'>
            </button>
      </form>
      
    <br><br>
<div class="d-flex flex-row mb-3">
      <div style="width:1250px; ">
      <form class="d-flex" role="search"  method="POST">
      <button type="button" class="btn btn-outline-secondary">Copy</button>
      <span style="width: 10px;"></span>
      <button type="button" class="btn btn-outline-secondary">Excel</button>
      <span style="width: 10px;"></span>
      <button type="button" class="btn btn-outline-secondary">Pdf</button>
      <span style="width: 10px;"></span>
      <button type="button" class="btn btn-outline-secondary">Csv</button>
      </form>
      </div>
      <div>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button   class="btn btn-outline-secondary" type="submit">Search</button>
           
      </form>
      </div>
    </div>
<br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Birthday</th>
                <th>Section</th>
                <th ><div style="margin-left: 50px">Actions </div></th>
            </tr>
        </thead>
        <tbody>
        <?php require_once 'Etudiant.php';
        $etudiant = new Etudiant();
        $etudiant->afficherEtudiant();
        ?>
        </tbody>
    </table>
</body>

</html>