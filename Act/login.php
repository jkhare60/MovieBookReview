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
                    (Don't have an account??)&nbsp;&nbsp;
                    <a href="signup.php">Sign-Up</a>
            </span>
        </div>
        <div id="b1">
            <form action="ind.php" method="post" id="b2">
            <h1>Login here:</h1>
            <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>CustomerId: </label>
            <input type="text" name="uname" id="a" />
            <br><br>
            <label>Password: </label>
            <input type="password" name="pass" id="b"></input>
            <br><br>
            <button id="login">Login</button>
            </form>
        </div>
        <div id="desc">
        The main objective of the Online Movie Ticket Booking System is to manage the details of Movie, Ticket and reviews. The purpose of the project is to build an application program to reduce the manual work for managing the Movie bookings and reviews.    
        </div>
    </body>
</html>