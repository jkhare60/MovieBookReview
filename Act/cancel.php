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
if (isset($_SESSION['name'])&&isset($_SESSION['userid'])) {
$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);
?>
?>
<html>
    <head>
        <title>
            Welcome : BookYourShow
        </title>
    </head>
    <link href="movie.css" rel="stylesheet">
    </link>
    <body>
        <div id="header">
            Welcome to the BookYourShow website
        </div>
        <div id="taskbar">
            <span>
                    <a href="search.php">MyPage</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="book.php">Booking</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="cancel.php">Cancellation</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="review.php">Rate movie</a>
            </span>
        </div>
        <div>
            <h4>Hello, <?php echo $_SESSION['name']; ?></h4>
            <a href="logout.php">Logout</a>
        </div>
        <section>
        <h1>Bookings List</h1>
        <table>
            <tr>
                <th>User ID</th>
                <th>Movie</th>
                <th>Seat</th>
                <th>Date</th>
            </tr>
            <?php   
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows['userid'];?></td>
                <td><?php echo $rows['movie'];?></td>
                <td><?php echo $rows['seat'];?></td>
                <td><?php echo $rows['date'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
        <div id="b1">
            <form id="b2" action="c.php" method="post">
            <h1>Cancel Your tickets here:</h1>
            <button id="sub">Cancel</button>
            </form>
        </div>
        <div id="desc">
        The main objective of the Online Movie Ticket Booking System is to manage the details of Movie, Ticket and reviews. The purpose of the project is to build an application program to reduce the manual work for managing the Movie bookings and reviews.    
        </div>
    </body>
</html>
<?php 
}else{
     header("Location: login.php");
     exit();
}
?>