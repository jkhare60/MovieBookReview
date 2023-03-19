<?php 
session_start();
if (isset($_SESSION['name'])&&isset($_SESSION['userid'])) {
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
                    <a href="book.php">Booking</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="cancel.php">Cancellation</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="review.php">Rate movie</a>
            </span>
        </div>
        <div>
            <h4>Hello, <?php echo $_SESSION['name']; ?></h4>
            <a href="logout.php">Logout</a>
        </div>
        <div>
            <span>
                <img src="mos.jpg" width=33% height=750 id="mos">
                <img src="zsjl.jpg" width=33% height=750>
                <img src="bvs.jpg" width=33% height=750>
            </span>
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