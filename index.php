<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){
    require_once 'database.php';
    $db = new database();
    $db->login($_POST['username'], $_POST['password']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Medewerker</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" required><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    
    
    </form>
</body>
</html>