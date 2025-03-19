<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    <title>Home</title>
</head>
<body>

    <h1>Welcome to Our Website</h1>
    <p>This is a public page that anyone can access.</p>

    <nav>
        <a href="home.php">Home</a>
        <a href="services.php">Services</a>
        <a href="register.php">Register</a>

        <?php if (!empty($_SESSION['Active']) && $_SESSION['Active'] === true): ?>
            <a href="index.php">Dashboard</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
              
        <?php else: ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
    </nav>

    <?php if (empty($_SESSION['Active']) || $_SESSION['Active'] !== true): ?>
        <p><a href="login.php">Login</a> to access more features.</p>
    <?php endif; ?>

</body>
</html>