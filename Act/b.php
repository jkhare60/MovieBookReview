<?php

session_start(); 
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "activity5";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if (!$conn) {
    echo "Connection failed!";
}

if(isset($_POST['movie']) && isset($_POST['seat']) && isset($_POST['date'])&&isset($_SESSION['userid']))
{    function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$uname = validate($_SESSION['userid']);
$movie = validate($_POST['movie']);
$seat = validate($_POST['seat']);
$date = date($_POST['date']);

$query = "INSERT INTO bookings (userid, movie, seat, date) VALUES ('$uname','$movie','$seat','$date')";
 
if (mysqli_query($conn, $query)) {
    header("Location: book.php?error=Your booking was Successfull. Let's book another ticket :)");
    exit();
} else {
    header("Location: book.php?error=Try again");
    exit();
}
mysqli_close($conn);
}

?>