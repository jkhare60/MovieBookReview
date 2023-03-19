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

if(isset($_SESSION['userid']))
{    function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$uname = validate($_SESSION['userid']);
if(empty($uname)){
    header("Location: cancel.php?error=Try Again");
    exit();
}
else{
     
    $query = "DELETE FROM bookings WHERE userid='$uname'";
 
    if (mysqli_query($conn, $query)) {
        header("Location: book.php?error=Your cancellation was Successfull. Wanna try some other movie :)");
        exit();
    } else {
        header("Location: cancel.php?error=Try again");
        exit();
    }
    mysqli_close($conn);
}
}
else{
    header("Location: cancel.php?error=Try again");
    exit();
}

?>