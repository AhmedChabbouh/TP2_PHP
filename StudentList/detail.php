
<?php
$id=$_GET['id'];
$host = 'localhost';
$dbname = 'StudentsManager';
$username = 'root';
$password = '';
try{
$bd=new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$query="select * from student where id=?";
$reponse=$bd-> prepare($query);
$reponse->execute([$id]);

if($reponse->rowCount() == 0) {
    echo "No student found with this ID.";
    exit();
}
$student=$reponse->fetch(PDO::FETCH_OBJ);



} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>info about <?php echo $student->name;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="alert alert-success" role="alert">
       <h1>student <?php echo $student->name;?></h1>
    
    <h2>GL</h2>
    <h2><?php echo $student->birthday;?></h2>
    </div>
</body>
</html>