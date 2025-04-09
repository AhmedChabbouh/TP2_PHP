<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Section List</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-body"  data-bs-theme="dark" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Student management System</a>
    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        <a class="nav-link" href="StudentList.php">Liste des Etudiants</a>
        <a class="nav-link" href="SectionList.php">Liste des Sections</a>
        <a class="nav-link" href="">Logout</a>
      </div>
    </div>
  </div>
</nav>
<div class="alert alert-secondary" role="alert">
  Liste des sections
</div>
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
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Designation</th>
                <th>Desciption</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'Section.php';
            $section = new Section();
            $section->afficherSection();
            $s=$section->listSection();
            for($j=0;$j<count($s);$j++){
                if(isset($_POST['action'.$j]))
                {
                  header("Location: List.php?id=".$s[$j]->id);
                  exit();
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>