<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        .form{

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: fit-content;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ced4da;

        }


        </style>
    <title>Register</title>
</head>
<body>
<?php session_start(); ?>

<?php $errors = &$_SESSION['errors'] ?? [];
$old = &$_SESSION['old'] ?? [];
?>
<div class="container-sm">
        <div class="form">
        <div class="alert alert-secondary" role="alert">
        <h1 style="text-align:center">Register</h1>
        </div>
        <div>
<form action="register_user.php" method="POST">
    <div class="mb-3">
    <label for="name" class="form-label">Name:</label>
    <?php if (isset($errors['name'])): ?>
        <div style="color: red;"><?php echo htmlspecialchars($errors['name']); ?></div>
        <?php unset($errors['name']); ?>
    <?php endif; ?>
    <input class="form-control" type="text" id="name" name="name" placeholder="name" autocomplete="off" value="<?php echo $old['name'];?>" required>
    <label for="email" class="form-label">Email address:</label>

    <?php if (isset($errors['email'])): ?>
        <div style="color: red;"><?php echo htmlspecialchars($errors['email']); ?></div>
        <?php unset($errors['email']); ?>
    <?php endif; ?>
    <input class="form-control" type="text" id="email" name="email" placeholder="email" autocomplete="off" value="<?php echo $old['email'];?>" required>
    <label for="password" class="form-label">Password:</label>
    <input class="form-control" type="password" id="password" name="password" placeholder="password"  required><br>
    <div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" class="btn btn-outline-secondary">Register</button>
    </div><br>
    <p>Already have an account? <a href="login.php" class="icon-link icon-link-hover">Login</a></p>
    </div>
</form>
</div>
</div>
</div>
</body>
</html>