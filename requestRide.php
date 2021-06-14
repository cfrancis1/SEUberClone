<?php
session_start();
require_once "config.php";

if(isset($_POST['submit'])) {
    $name =  $_POST['name'];
    $pickUp = $_POST['pickUp'];
    $dropOff = $_POST['dropOff'];
    $availability = $_POST['availibility'];
    $distance = $_POST['distance'];
    $passengers = $_POST['passengers'];
    $ccList = $_POST['ccList'];
    $uid = $_SESSION['id'];
    $sql = "INSERT INTO ride_request(name, pickUp, dropOff, availability, distance, passengers, cc) VALUES('$name', '$pickUp', '$dropOff', '$availability', '$distance', '$passengers', '$ccList')";
    $run = mysqli_query($link, $sql);

    if($run){
        header("location: rideConfirmed.html");
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="UberCSS.css">
        <title>Group 7 Uber Clone</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    background-image: url('https://images.pexels.com/photos/1831234/pexels-photo-1831234.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
                }
            </style>
    </head>
    
    <body>
        <h1 class="temptitle">Uber Clone</h1>
        <h2 class="apptitle">Requst Ride</h2>

        <div id="outer">
            <div class="inner"><button onclick="document.getElementById('RidesPopout').style.display='block'" class="register">View Available Drivers</button></div>
<br>
            <div class="inner"><button onclick="document.getElementById('NewPopout').style.display='block'" class="create">Specify Ride Details</button></div>
<br>
            <div class="inner"><button onclick="window.location.href='index.html'">Return to Home Page</button></div>
        </div>

        <div id="RidesPopout" class="modal">
            <form class="modal-settings animate" action="/action_page.php">
                <div class="imgholder">
                    <span onclick="document.getElementById('RidesPopout').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <h3>Available Drivers</h3>
                    <table style="width: 100%; position: center; border-top: 1px solid #444444; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th class="tablebrdr"><b>Name</b></th>
                                <th class="tablebrdr"><b>Rating</b></th>
                                <th class="tablebrdr"><b>Accept?</b></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="tablebrdr">John Smith</td>
                                <td class="tablebrdr">4.2</td>
                                <td class="tablebrdr"><button type="button" onclick="acceptRide()" class="acceptbtn">Accept</button></td>
                            </tr>

                            <tr>
                                <td class="tablebrdr">Jeff Jeffman</td>
                                <td class="tablebrdr">3.7</td>
                                <td class="tablebrdr"><button type="button" onclick="acceptRide()" class="acceptbtn">Accept</button></td>
                            </tr>

                            <tr>
                                <td class="tablebrdr">Des Pacito</td>
                                <td class="tablebrdr">4.1</td>
                                <td class="tablebrdr"><button type="button" onclick="acceptRide()" class="acceptbtn">Accept</button></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </form>
        </div>
        <div id="NewPopout" class="modal">

            <form class="modal-settings animate" method="post">
                <div class="imgholder">
                    <span onclick="document.getElementById('NewPopout').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
                    <label>Your Name &emsp;</label><input type="text" name="name" placeholder="Enter your name"/>
                    <br>
                    <label>Pick Up Location &emsp;</label><input type="text" name="pickUp" placeholder="Enter your pick up location"/>
                    <br>
                    <label>Drop Off Location &emsp;</label><input type="text" name="dropOff" placeholder="Enter your drop off location"/>
                    <br>
                    <label>Distance (miles) &emsp;</label><input type="number" name="distance" placeholder="Enter total distance (as number only)"/>
                    <br>
                    <label>Driver Availibility &emsp;</label><input type="text" name="availibility" placeholder="(in minutes: 5, 15, 30, etc.)"/>
                    <br>
                    <label>Type of Ride &emsp;</label><input type="number" name="passengers" placeholder="Enter total passengers"/>
                    <br>
                    <label>Select your Credit Card &emsp;</label>
                    <input type="number" name="ccList" list="ccList">
                        <datalist id="ccList">
                        <?php
                            $cc1=$cc2=$cc3='';
                            $query = "SELECT * FROM accounts WHERE id = '".$_SESSION['id']."'";
                            $rows = mysqli_query($link, $query);
                            while($row = mysqli_fetch_assoc($rows)) {
                                $cc1 = $row["cc1"];
                                $cc2 = $row["cc2"];
                                $cc3 = $row["cc3"];
                            }
                            echo '<option value="' . $cc1 . '">' . $cc1 . '</option>';
                            echo '<option value="' . $cc2 . '">' . $cc2 . '</option>';
                            echo '<option value="' . $cc3 . '">' . $cc3 . '</option>';
                        ?>
                        </datalist>
                    </input>
                    <br>
                    <input type="submit" name="submit" value="Request Ride"/>
          
                <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('NewPopout').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>

            <?php 
                if(!empty($login_err)){
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }        
            ?>
        </div>
        
    </body>
</html>