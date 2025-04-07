<?php
//if (!isset($_SERVER['PHP_AUTH_USER'])){
//	header('HTTP/1.0 401 Unauthorized');
//}
$dir = __dir__."/db.sqlite";
include "User.php";
try {
    $user = new User();
    $pdo = new PDO("sqlite:$dir");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected to SQLite in memory\n";
//    $user->setId(4)->setEmail("aminkhalsi@gmail.com")->setNom("Amin Khalsi");
//    $pdo->exec("INSERT INTO users (id,email) values (".$user->getId().",'".$user->getNom()."')");
}catch (PDOException $e){
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
</head>
<body>
<h1>Hello World</h1>
<?php
$stmt = $pdo->query("SELECT * FROM users");
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    echo $row['id'] . " " . $row['email'] . "<br>";
}
?>
<form action="button.php">
    <button type="submit"> Click me!</button>
</form>
</body>

</html>
