<?php
// Retrieve form data
$checkInDate = $_POST['check_in_date'];
$checkOutDate = $_POST['check_out_date'];
$guestName = $_POST['guest_name'];
$roomType = $_POST['room_type'];
$email = $_POST['email'];

// Perform validation and error checking on form data (e.g. check for empty fields, validate dates, etc.)

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'login_register');

// Insert reservation data into the database
$query = "INSERT INTO reservations (check_in_date, check_out_date, guest_name, room_type,email) 
          VALUES ('$checkInDate', '$checkOutDate', '$guestName', '$roomType','$email')";
mysqli_query($db, $query);

// Close database connection
mysqli_close($db);

// Redirect to confirmation page
header('Location: confirmation.php');
exit();
?>
