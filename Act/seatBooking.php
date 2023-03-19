<html>
    <head>
        <title>SEAT BOOKING</title>
        <link href="seat.css" rel="stylesheet"></link>
    </head>
    <body>
        <?php
        if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = ""; 
        $database = 'activity5';

        $con =new mysqli($server,$username,$password,$database);
        if(!$con){
            die("connection to this database failed due to" . mysqli_connect_error());
        }

        $name=$_POST['name'];
        $appid=$_POST['appid'];
        $cutoff=$_POST['cutoff'];
        $stream=$_POST['stream'];

        $sql="UPDATE 'seat' SET 'seats' = 'seats'-1 WHERE 'sno'='$stream';";

        if($con->query($sql) == true){
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
        $sql="INSERT INTO `student` (`name`, `appid`, `cutoff`, `stream`) VALUES ('$name', '$appid', '$cutoff', '$stream');";

        if($con->query($sql) == true){
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
        $con->close();
        }
        ?>
        <?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = 'activity5';

        $mysqli = new mysqli($server, $username, $password, $database);
  
        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
        }
  
        $sql = "SELECT * FROM seat";
        $result = $mysqli->query($sql);
        $mysqli->close();
        ?>
        <div id="f">
        <h1>Book your Seat</h1>
        <form action="seatBooking.php" method="post">
            <label>Student Name:</label>
            <input type="text" id="name"></input>
            <br><br>
            <label>Application id:</label>
            <input type="text" id="appid"></input>
            <br><br>
            <label>Cut-off:</label>
            <input type="text" id="cutoff"></input>
            <br><br>
            <label>Stream:</label>
            <select id="stream">
                <option>---Select---</option>
            <optgroup label="Group A">
                <option value=1>Bioengineering</option>
                <option value=2>Biotechnology</option>
                <option value=3>Chemical engg.</option>
                <option value=4>Civil engg.</option>
                <option value=5>Electrical and Electronics Engg.</option>
                <option value=6>Electronics and Instrumentation engg.</option>
                <option value=7>Production and Industrial engg.</option>
                <option value=8>Fashion Technology</option>    
            </optgroup>
            <optgroup label="Group B">
                <option value=9>Aerospace engg.</option>
                <option value=10>Computer Science and engg.</option>
                <option value=11>Electronics and Communication engg.</option>
                <option value=12>Electronics and Computer engg.</option>
                <option value=13>Information Technology</option>
                <option value=14>Mechanial engg.</option>
                <option value=15>Mechatronics and Automation</option>
            </optgroup>
            </select>    
            <br><br>
            <button>book</button>
            <br><br> 
        </form>
        </div>
        <div id="s">
        <table>
            <tr>
                <th>Sno.</th>
                <th>Stream</th>
                <th>Seats left</th>
            </tr>
            <?php   
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows['sno'];?></td>
                <td><?php echo $rows['stream'];?></td>
                <td><?php echo $rows['seats'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
        </div>
    </body>
    <script type="text/javascript">
    </script>
</html>