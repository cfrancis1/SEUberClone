<?php
session_start();
require_once "config.php";

// if(isset($_POST['remove'])) {
    

//     $sql = "DELETE FROM ride_request WHERE id = '".$_SESSION['id']."'"; 
//     $update = mysqli_query($link, $sql);

//     if($update){
//         //echo "$cc1";
//         echo "Credit Card successfully updated!.";
//     } else {
//         //echo "$cc1";
//         echo "Update Unsuccessful." . mysqli_error($link);
//     }
// }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Account</title>
    <link rel="stylesheet" href="UberCSS.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('https://images.pexels.com/photos/1831234/pexels-photo-1831234.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
        }
    </style>
</head>
<body>
    <h2 class="apptitle">Passenger Ride Requests</h2>
    <h3 class="apptitle">Click Select next to the Passenger's info to accept request</h2>
    <div>

        <h4>
        <table style="width:80%" class="center">
        <?php
            $query = "SELECT * FROM ride_request"; //This is very close i believe
            $rows = mysqli_query($link, $query);
            while($row = mysqli_fetch_assoc($rows)) {
                echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Pick Up</th>";
                echo "<th>Drop Off</th>";
                echo "<th>Expected Arrival at Pick Up</th>";
                echo "<th>Travel Distance</th>";
                echo "<th>Total Passengers</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['pickUp'] . "</td>";
                echo "<td>" . $row['dropOff'] . "</td>";
                echo "<td>" . $row['availability'] . "</td>";
                echo "<td>" . $row['distance'] . " miles" . "</td>";
                echo "<td>" . $row['passengers'] . "</td>";
                echo "<td><form method='post' action=\"passengerConfirmed.php?distance=".$row['distance']."&name=".$row['name']."\"><button type='submit' name='remove' value='your_value' class='create'>Select</button></form></td>";
                echo "</tr>";
            }
            //$_SESSION['ccForDrive'] = $row['cc'];
        ?>
        </table>
        </h4>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

    </div>
</body>
</html>