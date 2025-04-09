<?php
$password = sha1($_POST['password']);
$email = $_POST['email'];
$db= new PDO("sqlite:".__dir__."/db.sqlite");
$query = $db->prepare("SELECT * FROM users WHERE email = :email ");
$query->execute([':email' => $email]);
if($user = $query->fetch(PDO::FETCH_ASSOC)){
    session_start();
    $_SESSION['user'] = $user;
    var_dump($_SESSION);
    header('Location: home.php');
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