<?php

$host = 'localhost';
$dbname = 'StudentsManager';
$username = 'root';
$password = '';
try{
$bd=new PDO("mysql:host=$host;dbname=$dbname", $username, $password);



$query="select * from student";
$reponse=$bd-> query($query);

$students=$reponse->fetchAll(PDO::FETCH_OBJ);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>StudentListe</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Student List</h1>
        <table class="table table-striped">
    
        <tr class="table-dark">
        <th scope="col">Id</th>
        <th scope="col">Name</th> 
        <th scope="col">Birthday</th>
        <th scope="col"></th>
        </tr>
    
    <?php 
    $i=0;
    foreach($students as $student)
    {
        $i++;
        echo "<tr>";
        echo "<td>".$student->id."</td>";
        echo "<td>".$student->name."</td>";
        echo "<td>".$student->birthday."</td>";
        echo "<td>
              <form  method='POST'>
               <button type='submit' name='detail".$i."' class='btn btn-link'>
                    <img src='https://cdn-icons-png.flaticon.com/512/189/189664.png' alt='Details' width='25' height='25'>
                </button>
              </form>";
        echo "</tr>";
    }
    for($j=1;$j<=$i;$j++)
    {
        if(isset($_POST['detail'.$j])) {
            $student = $students[$j-1]; 
            header("Location: detail.php?id=".$student->id);}
    }
    
    ?>
    </table>
    
    </div>
</body>
</html>