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
    $sql = "SELECT * FROM review";
    $result = mysqli_query($conn, $sql);
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
                <th>Review</th>
                <th>Rating</th>
            </tr>
            <?php   
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows['userid'];?></td>
                <td><?php echo $rows['movie'];?></td>
                <td><?php echo $rows['review'];?></td>
                <td><?php echo $rows['rating'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
        </section>
        <div id="b1">
            <form id="b2" action="r.php" method="post">
            <h1>Write a review here:</h1>
            <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label for="movie">Movie Name: </label>
            <select name="movie" id="b" name="">
                <option>---Select---</option>
                <option value="Man of Steel">Man of Steel</option>
                <option value="Dawn of Justice">Dawn of Justice</option>
                <option value="Z">Zack Snyder's Justice League</option>
            </select>
            <br><br>
            <label>Review: </label>
            <input type="text" id="c" name="review"/>
            <br><br>
            <label for="rating">Rate Movie: </label>
            <select name="rating" id="b">
                <option>---Select---</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
            </select>
            <br><br>
            <button id="sub">Post</button>
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