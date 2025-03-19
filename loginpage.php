<?php
session_start();
include("locl.php");

if(isset($_POST['submit'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $query = "SELECT * FROM  Admin  WHERE Username='$u' AND Password='$p'";
    $results = mysqli_query($con, $query);
    $count = mysqli_num_rows($results);
    

    if ($count == 1) {
        $_SESSION['username']=$u;
        header("Location: home.php");
    } else {
        $err_m = "Invalid details";
    }
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
    <form action="loginpage.php" method="post">
        <?php

        if(isset($err_m)) {
            echo $err_m;
        }
        ?>
        <div class="login-container">
        
        <h2>Admin Login</h2>
        
        <input type="text" name="username" placeholder="username" id="username"required>
        
        
        <input type="password" name="password" placeholder="password" id="password" required>
        
        <input id="login" type="submit" name="submit" value="Login">
    </form>
    </div>
</body>

</html>
