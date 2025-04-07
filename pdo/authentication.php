<?php
$password = sha1($_POST['password']);
$email = $_POST['email'];
$db= new PDO("sqlite:".__dir__."/db.sqlite");
$query = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
$query->bindParam(':email', $email);
$query->bindParam(':password', $password);
$query->execute();
if($query->rowCount() === 1){
    session_start();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $user;
    header('Location: index.php');
}
else{
    echo "Invalid email or password";
}
