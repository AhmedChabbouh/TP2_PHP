<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
<form action="authentication.php" method="POST">
    <h1>Login</h1>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="email" required>
    <label for="password">Password:</label>
    <input type="password" id="password" placeholder="password">
    <button type="submit">Log in</button>
    <p>Don't have an account? <a href="register.php">Register</a></p>
</form>

</body>
</html>