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

if(isset($_POST['movie']) && isset($_POST['rating']) && isset($_POST['review'])&&isset($_SESSION['userid']))
{    function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$uname = validate($_SESSION['userid']);
$movie = validate($_POST['movie']);
$review = validate($_POST['review']);
$rating = validate($_POST['rating']);

$query = "INSERT INTO review (userid, movie, review, rating) VALUES ('$uname','$movie','$review','$rating')";
 
if (mysqli_query($conn, $query)) {
    header("Location: review.php?error=Review Posted. Let's post another Review :)");
    exit();
} else {
    header("Location: review.php?error=Try again");
    exit();
}
mysqli_close($conn);
}

?>