<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
<?php session_start(); ?>

<?php $errors = &$_SESSION['errors'] ?? [];
$old = &$_SESSION['old'] ?? [];
?>

<form action="register_user.php" method="POST">
    <h1>Register</h1>
    <label for="name">Name:</label>
    <?php if (isset($errors['name'])): ?>
        <div style="color: red;"><?php echo htmlspecialchars($errors['name']); ?></div>
        <?php unset($errors['name']); ?>
    <?php endif; ?>
    <input type="text" id="name" name="name" placeholder="name" autocomplete="off" value="<?php echo $old['name'];?>" required>
    <label for="email">Email:</label>

    <?php if (isset($errors['email'])): ?>
        <div style="color: red;"><?php echo htmlspecialchars($errors['email']); ?></div>
        <?php unset($errors['email']); ?>
    <?php endif; ?>
    <input type="text" id="email" name="email" placeholder="email" autocomplete="off" value="<?php echo $old['email'];?>" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="password"  required>
    <button type="submit">Register</button>
    <p>Already have an account? <a href="login.php">Login</a></p>
</form>


</body>
</html>