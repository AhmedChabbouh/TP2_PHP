<?php $title ="Student List";include 'header.php'; ?>
<?php
require_once 'Etudiant.php';
$etudiant = new Etudiant();
$etudiants = $etudiant->ListeEtudiant();
for ($j = 0; $j < count($etudiants); $j++) {

    if (isset($_POST['detail' . $j])) {
        header("Location: detail.php?id=" . $etudiants[$j]->id);

        exit();
    }
    if (isset($_POST['delete' . $j])) {
        $etudiant->deleteEtudiant($etudiants[$j]->id);
        header("Location: StudentList.php");

    }

    if (isset($_POST['edit' . $j])) {
        echo $j;
        header("Location: edit.php?id=" . $etudiants[$j]->id);
        exit();
    }

}
if (isset($_POST['add'])) {
    header("Location: add.php");
    exit();
}
$_SESSION['students'] = $etudiants;
?>
<div class="alert alert-secondary" role="alert">
    Liste des etudiants
</div>
<form class="d-flex" role="search" method="POST">
    <input class="form-control me-2" type="search" style="width:400px;" aria-label="Search">
    <div style="width:5px; "></div>
    <button class="btn btn-outline-secondary" type="submit">Filtrer</button>
    <button type='submit' name='add' class='btn btn-link'>
        <img src='https://cdn-icons-png.flaticon.com/512/9977/9977366.png' alt='add' width='30' height='30'>
    </button>
</form>

<br><br>
<div class="d-flex flex-row mb-3">
    <div style="width:1250px; ">
        <div style="display: flex; flex-direction: row">
        <form method="GET" action="export_student_csv.php">
            <button type="submit" class="btn btn-outline-secondary">Csv</button>
        </form>
        <span style="width: 10px;"></span>

        <form method="GET" action="export_student_pdf.php">
            <button type="submit" class="btn btn-outline-secondary">Pdf</button>
        </form>

        <span style="width: 10px;"></span>
        <form method="GET" action="export_student_excel.php">
            <button type="submit" class="btn btn-outline-secondary">Excel</button>
        </form>
        <span style="width: 10px;"></span>

        <button id="copy" type="button" class="btn btn-outline-secondary">Copy</button>
        <?php
        $copy = 'id,name,birthday,section' . "\\n";
        foreach ($etudiants as $etudiant) {
            $copy .= $etudiant->id . ",";
            $copy .= $etudiant->name . ",";
            $copy .= $etudiant->birthday . ",";
            $copy .= $etudiant->section . ",";
            $copy .= "\\n";
        }
        ?>
        <script>
            document.querySelector("#copy").addEventListener("click", () => {
                const text = "<?= $copy ?>";
                navigator.clipboard.writeText(text);
                alert("Text copied to clipboard");
            });
        </script>
        </div>
    </div>
    <div>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>
    </div>
</div>
<br>
    <table id="studentsTable" >
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
        $etudiant->afficherEtudiant($_SESSION['user']->role == 'admin');
        ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function () {
            $('#studentsTable').DataTable({
                pageLength: 5, // nombre d'éléments par page
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json' // Français
                }
            });
        });
    </script>
<?php include 'footer.php'; ?>