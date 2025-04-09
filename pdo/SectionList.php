<?php $title = "Liste Sections";
include 'header.php'; ?>
<?php
require_once 'Section.php';
$section = new Section();
if (!isset($_SESSION["sections"])) {
    $_SESSION["sections"] = $section->listSection();
}
$sections=$_SESSION["sections"];
?>
    <div class="alert alert-secondary" role="alert">
        Liste des sections
    </div>
    <div class="d-flex flex-row mb-3">
        <div style="display: flex;flex-direction: row; width:1250px; ">
            <button id="copy" type="button" class="btn btn-outline-secondary">Copy</button>
            <span style="width: 10px;"></span>
            <form class="d-flex" action="export_section_excel.php" method="GET">
                <button type="submit" class="btn btn-outline-secondary">Excel</button>
                <span style="width: 10px;"></span>
            </form>
            <form class="d-flex" action="export_section_pdf.php" method="GET">
                <button type="submit" class="btn btn-outline-secondary">Pdf</button>
                <span style="width: 10px;"></span>
            </form>
            <form class="d-flex" action="export_section_csv.php" method="GET">
                <button type="submit" class="btn btn-outline-secondary">Csv</button>
            </form>
        </div>
    </div>
<?php
$copy = 'id,designation,description' . "\\n";
foreach ($sections as $s) {
    $copy .= $s->id . ",";
    $copy .= $s->designation . ",";
    $copy .= $s->description ;
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
    <table id="sectionsTable">
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
        $section->afficherSection();
        $se = $section->listSection();
        for ($j = 0; $j < count($se); $j++) {
            if (isset($_POST['action' . $j])) {
                header("Location: List.php?id=" . $se[$j]->id);
                exit();
            }
        }
        ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function () {
            $('#sectionsTable').DataTable({
                pageLength: 5, // nombre d'éléments par page
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json' // Français
                }
            });
        });
    </script>
<?php include 'footer.php'; ?>