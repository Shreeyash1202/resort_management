<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
  <title>Reservation Confirmation</title>
</head>
<body>
  <h1>Reservation Confirmation</h1>

  <?php
    // Connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'login_register');

    // Retrieve reservation details from the database
    $query = "SELECT * FROM reservations ORDER BY reservation_id DESC LIMIT 1"; // Assumes reservation_id is an auto-increment primary key
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $checkInDate = $row['check_in_date'];
      $checkOutDate = $row['check_out_date'];
      $guestName = $row['guest_name'];
      $roomType = $row['room_type'];

      // Display reservation details
      echo "<p>Your reservation has been confirmed. Thank you for choosing our resort.</p>";
      echo "<p>Reservation Details:</p>";
      echo "<ul>";
      echo "<li>Guest Name: " . $guestName . "</li>";
      echo "<li>Check-in Date: " . $checkInDate . "</li>";
      echo "<li>Check-out Date: " . $checkOutDate . "</li>";
      echo "<li>Room Type: " . $roomType . "</li>";
      echo "</ul>";
    } else {
      echo "<p>No reservation details found.</p>";
    }

    // Close database connection
    mysqli_close($db);
  ?>
  <a href="logout.php" class="btn btn-warning">Logout</a>

</body>
</html>