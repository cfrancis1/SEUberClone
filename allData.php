<?php
session_start();
require_once "config.php";
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Data</title>
    <link rel="stylesheet" href="UberCSS.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('https://images.pexels.com/photos/1831234/pexels-photo-1831234.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
        }
    </style>
</head>
<body>
    <h2 class="apptitle">All Data in Database</h2>
    <div>
        <h3 class="apptitle">Active Pickup Requests</h3>
        <h4>
        <table style="width:80%" class="center">
        <tr>
            <th>Name</th>
            <th>Pick Up</th>
            <th>Drop Off</th>
            <th>Expected Arrival at Pick Up</th>
            <th>Travel Distance</th>
            <th>Total Passengers</th>
            <th>Credit Card</th>
        </tr>
        <?php
            $query = "SELECT * FROM ride_request";
            $rows = mysqli_query($link, $query);
            while($row = mysqli_fetch_assoc($rows)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['pickUp'] . "</td>";
                echo "<td>" . $row['dropOff'] . "</td>";
                echo "<td>" . $row['availability'] . "</td>";
                echo "<td>" . $row['distance'] . " miles" . "</td>";
                echo "<td>" . $row['passengers'] . "</td>";
                echo "<td>" . $row['cc'] . "</td>";
                echo "</tr>";
            }
        ?>
        </table>
        <br>
        <br>
        <h3 class="apptitle">All Accounts</h3>
        <h4>
        <table style="width:100%" class="center">
        <tr>
            <th>Account ID</th>
            <th>Name</th>
            <th>username</th>
            <th>password</th>
            <th>Credit Card 1</th>
            <th>Credit Card 2</th>
            <th>Credit Card 3</th>
            <th>Favorite Location 1</th>
            <th>Favorite Location 2</th>
            <th>Favorite Location 3</th>
            <th>Total Cash</th>
        </tr>
        <?php
            $query = "SELECT * FROM accounts";
            $rows = mysqli_query($link, $query);
            while($row = mysqli_fetch_assoc($rows)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['cc1'] . "</td>";
                echo "<td>" . $row['cc2'] . "</td>";
                echo "<td>" . $row['cc3'] . "</td>";
                echo "<td>" . $row['favL1'] . "</td>";
                echo "<td>" . $row['favL2'] . "</td>";
                echo "<td>" . $row['favL3'] . "</td>";
                echo "<td>" . $row['totalCash'] . "</td>";
                echo "</tr>";
            }
        ?>
        </table>
        </h4>

        <div id="outer"><div class="inner"><button onclick="window.location.href='adminPage.php'" class="admin">Return to Admin Page</button></div></div>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

    </div>
</body>
</html>