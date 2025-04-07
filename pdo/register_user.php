<?php
session_start();
$errors = [];
$name = $_POST['name'];
$email = $_POST['email'];
$password_text = $_POST['password'];
$password = sha1($password_text);
try {
    $db = new PDO("sqlite:" . __dir__ . "/db.sqlite");
    check_name($name);
    check_email($email);
    check_password($password_text);
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = ['name' => $name, 'email' => $email]; // repopulate form
        header("Location: register.php");
        exit;
    }
    $query = $db->prepare("INSERT INTO users ( email, password) VALUES ( :email, :password)");
//        $query->bindParam(':Name', $name);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $password);
    $query->execute();
    $_SESSION['user'] = [
        'id' => $db->lastInsertId(),
        'email' => $email,
        'password' => $password,
        'role' => 'user'
    ];
    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    echo $e->getMessage();
}

// go back to index.php
function check_name($name)
{
    global $errors;
    if (empty($name)) {
        $errors['name'] = "Name is required";
    }
}

function check_email($email)
{
    global $errors;
    global $db;
    //email must have @ and .com
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = "Invalid email";
    }
    $query = $db->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    if ($query->rowCount() > 0) {
        $errors['email'] = "Email already exists";
    }
}

function check_password($password_text)
{

}

?>
<button type="button" onclick="window.location.href='index.php'">Go to index</button>
