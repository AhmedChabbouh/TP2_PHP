<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
$students = [];
$dir = __dir__ . "/db.sqlite";
$db= new PDO("sqlite:$dir");
$stmt = $db->query("SELECT * FROM students");
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $students[] = $row;
}
$_SESSION['students'] = $students;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<body>

<table id="studentsTable" class="display">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Birthday</th>
        <th>Section</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= htmlspecialchars($student['name']) ?></td>
            <td><?= htmlspecialchars($student['birthday']) ?></td>
            <td><?= htmlspecialchars($student['section']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<form method="GET" action="export_csv.php">
<button type="submit">Export CSV</button>
</form>

<form method="GET" action="export_pdf.php">
    <button type="submit">Export PDF</button>
</form>
<form method="GET" action="export_excel.php">
    <button type="submit">Export Excel</button>
</form>

<button id="copy">Copy</button>
<?php
$copy ='id,name,birthday,section' . "\\n";
foreach ($students as $student) {
    $copy .= $student['id'] . ",";
    $copy .= $student['name'] . ",";
    $copy .= $student['birthday'] . ",";
    $copy .= $student['section'] . ",";
    $copy .= "\\n";
}
?>
<input type="text" value="<?= htmlspecialchars($copy) ?>" id="phpText" readonly style="position:absolute; left:-9999px;">
<script>
    document.querySelector("#copy").addEventListener("click", () => {
        const text = "<?= $copy ?>";
        console.log(text);
        navigator.clipboard.writeText(text).then(() => {
            // Success!
            console.log("Text copied to clipboard");
        }, () => {
            // Error!
            console.error("Error copying text to clipboard");
        });
        alert("Text copied to clipboard");
    });
</script>
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
</body>
</html>
