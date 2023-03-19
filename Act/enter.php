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

if(isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['name']))
{    function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$uname = validate($_POST['uname']);
$pswd = validate($_POST['pass']);
$name = validate($_POST['name']);
if (empty($uname)) {
    header("Location: signup.php?error=User Name is required");
    exit();
}
else if(empty($pswd)){
    header("Location: signup.php?error=Password is required");
    exit();
}
else if(empty($name)){
    header("Location: signup.php?error=Name is required");
    exit();
}
else{
     
    $query = "INSERT INTO login (userid, name, pass) VALUES ('$uname','$name','$pswd')";
 
    if (mysqli_query($conn, $query)) {
        header("Location: login.php?error=Your details have been registered please login.");
        exit();
    } else {
        header("Location: signup.php?error=Try again");
        exit();
    }
    mysqli_close($conn);
}
}
else{
    header("Location: signup.php?error=Try again");
    exit();
}

?>