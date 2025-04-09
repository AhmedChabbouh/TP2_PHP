<?php
//if (!isset($_SERVER['PHP_AUTH_USER'])){
//	header('HTTP/1.0 401 Unauthorized');
//}
$dir = __dir__ . "/db.sqlite";
include "User.php";
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
try {
    //$user = new User();
    $pdo = new PDO("sqlite:$dir");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected to SQLite in memory\n";
//    $user->setId(4)->setEmail("aminkhalsi@gmail.com")->setNom("Amin Khalsi");
//    $pdo->exec("INSERT INTO users (id,email) values (".$user->getId().",'".$user->getNom()."')");
} catch (PDOException $e) {
    echo $dir;
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello World</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<body>
<h1>Hello World</h1>
<?php
$students = [];
$stmt = $pdo->query("SELECT * FROM users");
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    //add user to the array
    $students[] = $row;
}
?>

<table id="studentsTable" class="display">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
<!--        <th>Section</th>-->
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= htmlspecialchars($student['name']) ?></td>
            <td><?= htmlspecialchars($student['email']) ?></td>
            <!--            <td>--><?php //= htmlspecialchars($student['section']) ?><!--</td>-->
        </tr>
    <?php endforeach; ?>
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
<form action="logout.php" method="POST">
    <button type="submit"> Logout</button>

</form>
</body>

</html>
