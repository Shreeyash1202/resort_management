<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: reservation.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .logo {
            color: #f2f2f2; 
            padding: 8px 12px;
            position: absolute;
            top: 2px; 
            width: 100%;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="logo" >
        <img src="logobg.jpg" alt="logo" style="width: 17%" style="height:7%">
    </div>
    <div>
        <a href="index.html"><img  src="images/hp.jpg" style="width:4%" style="height:4%" align="right" alt="HOME"></a>
    </div>

    <div class="container">]
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    $_SESSION["user_email"] = $email; // Store email in session variable
                    header("Location: reservation.html");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <center><h1  style="font-size:300%; color: rgb(183, 185, 98);font-family: Serif;"> LOGIN</h1></center>

            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
        
    </div>
    <div><p ><a href="admin.php">Admin login</a></p></div>
</body>
</html>
