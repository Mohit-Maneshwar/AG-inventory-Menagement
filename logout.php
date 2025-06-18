<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Out</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
   
    <?php "header.php" ?>

    <?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>


    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>


</body>

</html>