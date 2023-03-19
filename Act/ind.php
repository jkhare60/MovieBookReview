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
        if (isset($_POST['uname']) && isset($_POST['pass'])) {        
        function validate($data){
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
        $uname = validate($_POST['uname']);
        $pass = validate($_POST['pass']);
        if (empty($uname)) {
            header("Location: login.php?error=User Name is required");
            exit();
        }
        else if(empty($pass)){
            header("Location: login.php?error=Password is required");
            exit();
        }
        else{
            $sql = "SELECT * FROM login WHERE userid='$uname' AND pass='$pass'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['userid'] === $uname && $row['pass'] === $pass) {
                    echo "Logged in!";
                    $_SESSION['userid'] = $row['userid'];
                    $_SESSION['name'] = $row['name'];
                    header("Location: search.php");
                    exit();
                }
                else{
                    header("Location: login.php?error=Incorect User name or password");
                    exit();
                }
            }
            else{
                header("Location: login.php?error=Incorect User name or password");
                exit();
            }
        }
        }
        else{
            header("Location: login.php");
            exit();
        }
        ?>