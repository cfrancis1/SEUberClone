<?php
session_start();
require_once "config.php";

if(isset($_POST['update1'])) {
    $cc = $_POST['cc'];

    $sql = "UPDATE accounts SET cc1='$cc' WHERE id = '".$_SESSION['id']."'"; 
    $update = mysqli_query($link, $sql);

    if($update){
        //echo "$cc1";
        echo "Credit Card successfully updated!.";
    } else {
        //echo "$cc1";
        echo "Update Unsuccessful." . mysqli_error($link);
    }
}
if(isset($_POST['update2'])) {
    $cc = $_POST['cc'];

    $sql = "UPDATE accounts SET cc2='$cc' WHERE id = '".$_SESSION['id']."'"; 
    $update = mysqli_query($link, $sql);

    if($update){
        //echo "$cc1";
        echo "Credit Card successfully updated!.";
    } else {
        //echo "$cc1";
        echo "Update Unsuccessful." . mysqli_error($link);
    }
}
if(isset($_POST['update3'])) {
    $cc = $_POST['cc'];

    $sql = "UPDATE accounts SET cc3='$cc' WHERE id = '".$_SESSION['id']."'"; 
    $update = mysqli_query($link, $sql);

    if($update){
        //echo "$cc1";
        echo "Credit Card successfully updated!.";
    } else {
        //echo "$cc1";
        echo "Update Unsuccessful." . mysqli_error($link);
    }
}

if(isset($_POST['update4'])) {
    $password = $_POST['password'];

    $sql = "UPDATE accounts SET password='$password' WHERE id = '".$_SESSION['id']."'"; 
    $update = mysqli_query($link, $sql);

    if($update){
        //echo "$cc1";
        echo "Password successfully updated!.";
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
    <div class="wrapper">
        <h2 class="apptitle">Your Account Information</h2>
        <h4>
        <?php
            $query = "SELECT * FROM accounts WHERE id = '".$_SESSION['id']."'"; //This is very close i believe
            $rows = mysqli_query($link, $query);
            
            while($row = mysqli_fetch_assoc($rows)) {
                printf('Name: %s', $row["name"]);
                echo "<br>";
                printf('Username: %s', $row["username"]);
                echo "<br>";
                echo "<br>";
                echo "Credit Cards";
                echo "<br>";
                if($row["cc1"] == 0) {
                    echo "You dont have a Credit Card 1 inputted";
                    echo "<br>";
                } else {
                    printf('Credit Card 1: %s', $row["cc1"]);
                    echo "<br>";
                }
                if($row["cc2"] == 0) {
                    echo "You dont have a Credit Card 2 inputted";
                    echo "<br>";
                } else {
                    printf('Credit Card 2: %s', $row["cc2"]);
                    echo "<br>";
                }                
                if($row["cc3"] == 0) {
                    echo "You dont have a Credit Card 3 inputted";
                    echo "<br>";
                } else {
                    printf('Credit Card 3: %s', $row["cc3"]);
                    echo "<br>";
                }          
            }
        ?>
        </h3>
        <div class="return">
            <form action="" method="POST">
                <input type="number" name="cc" placeholder="Enter Credit Card Number"/>
                <br>
                <input type="submit" name="update1" value="Update Credit Card 1"/>
                <input type="submit" name="update2" value="Update Credit Card 2"/>
                <input type="submit" name="update3" value="Update Credit Card 3"/>
                <br>
                <input type="text" name="password" placeholder="Enter New Password"/>
                <br>
                <input type="submit" name="update4" value="Update Password"/>
            </form>
            <button onclick="window.location.href='passengerPage.php'">Return to Passenger Page</button>
        </div>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

    </div>
</body>
</html>