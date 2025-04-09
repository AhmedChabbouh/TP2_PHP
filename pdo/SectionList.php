<?php include 'header.php'; ?>
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
<?php include 'footer.php'; ?>