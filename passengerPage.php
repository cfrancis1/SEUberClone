<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
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
            <div class="inner"><button onclick="window.location.href='requestRide.html'" class="register">Find a Ride</button></div>
            <div class="inner"><button onclick="document.getElementById('ReportsPopout').style.display='block'" class="reports">Administrative Reports</button></div>
            <div class="inner"><button onclick="window.location.href='editAccount.php'" class="profile">Edit Profile</button></div>
            <div class="inner"><button onclick="window.location.href='logout.php'" class="signout">Sign Out</button></div>
        </div>

        <div id="ReportsPopout" class="modal">
            <form class="modal-settings animate" action="/action_page.php">
                <div class="imgholder">
                    <span onclick="document.getElementById('ReportsPopout').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Temporary_plate.svg/601px-Temporary_plate.svg.png" alt="Avatar" class="settings">
                </div>
          
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('ReportsPopout').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>
    </body>
</html>