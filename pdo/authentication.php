<?php
$password = sha1($_POST['password']);
$email = $_POST['email'];
$db= new PDO("sqlite:".__dir__."/db.sqlite");
$query = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password ");
$query->execute([':email' => $email, ':password' => $password]);
if($query->fetch()){
    session_start();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $user;
    header('Location: index.php');
}
else{
    foreach ($query->errorInfo() as $error) {
        echo $error."<br>";
    }
    var_dump($query->rowCount());
    echo $password."<br>";
    echo $_POST['password']."<br>";
    echo "Invalid email or password";
}
