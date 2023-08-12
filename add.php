
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>

<body>
<div  >
                                    <img src="logobg.jpg" alt="logo" style="width: 20%" style="height:9%">
                                    </div>
                                    <br><br>
<h1 style="font-size:300%; font-family: Bell MT;color:rgb(183, 185, 98);"  ><center> USERS</center></h1>
<br><br>

<?php
// Connect to the database
$servername = "localhost";  // Replace with your database server name
$username = "root";    // Replace with your database username
$password = "";    // Replace with your database password
$dbname = "login_register";      // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";  // Replace 'users' with the name of your table

$result = $conn->query($sql);

// Check if any results returned
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Name: " . $row["full_name"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        // Add more fields as needed
        echo "<br>";
    }
} else {
    echo "No results found.";
}

// Close database connection
$conn->close();
?>
<a href="linking.html">
<button class="btn btn-warning"  >BACK</button></a>
<a href="reservation.html">

        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>