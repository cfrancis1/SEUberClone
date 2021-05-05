<?php
session_start();
require_once "config.php";    

$distance = $_GET['distance'];
$name = $_GET['name'];
$remove = "DELETE FROM ride_request WHERE name = '$name' and distance = '$distance'"; 
$update = mysqli_query($link, $remove);


if(isset($_POST['delivered'])) {
    //$distance = $_GET['distance'];
    $moneyPerMile = 4;
    $total = $distance * $moneyPerMile;

    $sql = "UPDATE accounts set totalCash=totalCash+'$total' WHERE id = '".$_SESSION['id']."'"; //This is very close i believe
    $update = mysqli_query($link, $sql);

    if($update){
        //echo "$cc1";
        header("location: driverMoney.php");
    } else {
        //echo "$cc1";
        echo "Update Unsuccessful." . mysqli_error($link);
    }
}
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
    <div class="return">
        <h2 class="apptitle">Passenger Selected</h2>
        <h3 class="apptitle">Please keep this screen open until the passenger has been delivered to their destination</h3>
        <h4 class="apptitle">Upon reaching your destination, your account will be credited $4 per mile</h3>
        <form method="post" action="">
            <button name="delivered">Passenger Delivered</button>
        </form>

        <!-- onclick="window.location.href='driverMoney.php'" -->

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

    </div>
</body>
</html>