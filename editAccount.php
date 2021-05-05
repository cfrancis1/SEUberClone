<?php
session_start();
require_once "config.php";

$password_err = $password = "";

if(isset($_POST['update1'])) {
    $cc = $_POST['cc'];

    $sql = "UPDATE accounts SET cc1='$cc' WHERE id = '".$_SESSION['id']."'"; 
    $update = mysqli_query($link, $sql);

    if($update){
        echo "Credit Card successfully updated!.";
    } else {
        echo "Update Unsuccessful." . mysqli_error($link);
    }
}
if(isset($_POST['update2'])) {
    $cc = $_POST['cc'];

    $sql = "UPDATE accounts SET cc2='$cc' WHERE id = '".$_SESSION['id']."'"; 
    $update = mysqli_query($link, $sql);

    if($update){
        echo "Credit Card successfully updated!.";
    } else {
        echo "Update Unsuccessful." . mysqli_error($link);
    }
}
if(isset($_POST['update3'])) {
    $cc = $_POST['cc'];

    $sql = "UPDATE accounts SET cc3='$cc' WHERE id = '".$_SESSION['id']."'"; 
    $update = mysqli_query($link, $sql);

    if($update){
        echo "Credit Card successfully updated!.";
    } else {
        echo "Update Unsuccessful." . mysqli_error($link);
    }
}


if(isset($_POST['update5'])) {
    $favL = $_POST['favL'];

    $sql = "UPDATE accounts SET favL1='$favL' WHERE id = '".$_SESSION['id']."'"; 
    $update = mysqli_query($link, $sql);

    if($update){
        echo "Favorite Location successfully updated!.";
    } else {
        echo "Update Unsuccessful." . mysqli_error($link);
    }
}
if(isset($_POST['update6'])) {
    $favL = $_POST['favL'];

    $sql = "UPDATE accounts SET favL2='$favL' WHERE id = '".$_SESSION['id']."'"; 
    $update = mysqli_query($link, $sql);

    if($update){
        echo "Favorite Location successfully updated!.";
    } else {
        echo "Update Unsuccessful." . mysqli_error($link);
    }
}
if(isset($_POST['update7'])) {
    $favL = $_POST['favL'];

    $sql = "UPDATE accounts SET favL3='$favL' WHERE id = '".$_SESSION['id']."'"; 
    $update = mysqli_query($link, $sql);

    if($update){
        echo "Favorite Location successfully updated!.";
    } else {
        echo "Update Unsuccessful." . mysqli_error($link);
    }
}


if(isset($_POST['update4'])) {
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
        echo $password_err;     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
        echo $password_err;
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty($password_err)) {

        $sql = "UPDATE accounts SET password='$password' WHERE id = '".$_SESSION['id']."'"; 
        $update = mysqli_query($link, $sql);

        if($update){
            echo "Password successfully updated!.";
        } else {
            echo "Update Unsuccessful." . mysqli_error($link);
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View/Edit Account</title>
    <link rel="stylesheet" href="UberCSS.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('https://images.pexels.com/photos/1831234/pexels-photo-1831234.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
        }
    </style>
</head>
<body>
    <div>
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
                printf('Money in Account: %.02f', $row["totalCash"]);
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
                echo "<br>";
                echo "Favorite Locations";
                echo "<br>";
                if($row["favL1"] == '') {
                    echo "You dont have a Favorite Location 1";
                    echo "<br>";
                } else {
                    printf('Favorite Location 1: %s', $row["favL1"]);
                    echo "<br>";
                }
                if($row["favL2"] == '') {
                    echo "You dont have a Favorite Location 2";
                    echo "<br>";
                } else {
                    printf('Favorite Location 2: %s', $row["favL2"]);
                    echo "<br>";
                }                
                if($row["favL3"] == '') {
                    echo "You dont have a Favorite Location 3";
                    echo "<br>";
                } else {
                    printf('Favorite Location 3: %s', $row["favL3"]);
                    echo "<br>";
                }       
            }
        ?>
        </h4>
        <div class="return">
            <form action="" method="POST">
                <input type="number" name="cc" placeholder="Enter Credit Card Number"/>
                <br>
                <input type="submit" name="update1" value="Update Credit Card 1"/>
                <input type="submit" name="update2" value="Update Credit Card 2"/>
                <input type="submit" name="update3" value="Update Credit Card 3"/>
                <br>
                <input type="text" name="favL" placeholder="Enter Favorite Location"/>
                <br>
                <input type="submit" name="update5" value="Update Favorite Location 1"/>
                <input type="submit" name="update6" value="Update Favorite Location 2"/>
                <input type="submit" name="update7" value="Update Favorite Location 3"/>
                <br>
                <input type="text" name="password" placeholder="Enter New Password"/>
                <br>
                <input type="submit" name="update4" value="Update Password"/>
            </form>
            <button onclick="window.location.href='index.html'">Return to Home Page</button>
        </div>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

    </div>
</body>
</html>