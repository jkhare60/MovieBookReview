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
                    <a href="movie.php">Homepage</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    (Already have an account??)&nbsp;&nbsp;
                    <a href="login.php">Login</a>
            </span>
        </div>
        <div id="b1">
            <form action="enter.php" method="post" id="b2">
            <h1>Sign-up here:</h1>
            <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Create CustomerId: </label>
            <input type="text" id="a" name="uname"/>
            <br><br>
            <label>Create Password: </label>
            <input type="password"  id="b" name="pass"/>
            <br><br>
            <label>Enter Name: </label>
            <input type="text" id="a" name="name"/>
            <br><br>
            <button id="signup">Sign-up</button>
            </form>
        </div>
        <div id="desc">
        The main objective of the Online Movie Ticket Booking System is to manage the details of Movie, Ticket and reviews. The purpose of the project is to build an application program to reduce the manual work for managing the Movie bookings and reviews.    
        </div>
    </body>
</html>