<?php
// Initialize the session
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.html");
    exit;
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
        <h2 class="apptitle">Passenger</h2>

        <div id="outer">
            <div class="inner"><button onclick="window.location.href='requestRide.php'" class="register">Find a Ride</button></div>
            <div class="inner"><button onclick="window.location.href='editAccount.php'" class="profile">View/Edit Account</button></div>
            <div class="inner"><button onclick="window.location.href='logout.php'" class="signout">Sign Out</button></div>
        </div>

    </body>
</html>