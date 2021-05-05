<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
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
        <h2 class="apptitle">Driver</h2>

        <div id="outer">
            <div class="inner"><button onclick="document.getElementById('RequestPopout').style.display='block'" class="request">Register For Driving</button></div>
            <div class="inner"><button onclick="document.getElementById('ReportsPopout').style.display='block'" class="reports">Administrative Reports</button></div>
            <div class="inner"><button onclick="document.getElementById('ProfilePopout').style.display='block'" class="profile">Setup/View Profile</button></div>
            <div class="inner"><button onclick="getLocation()" class="map">View Map</button></div>
            <div class="inner"><button onclick="window.location.href='checkRidesDriverPage.php'" class="rides">Check Rides</button></div>
            <div class="inner"><button onclick="window.location.href='logout.php'" class="signout">Sign Out</button></div>
            <div id="mapholder"></div>
        </div>

        <div id="RequestPopout" class="modal">
            <form class="modal-settings animate" action="/action_page.php">
                <div class="imgholder">
                    <span onclick="document.getElementById('RequestPopout').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Temporary_plate.svg/601px-Temporary_plate.svg.png" alt="Avatar" class="settings">
                </div>
          
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('RequestPopout').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>

        <div id="ProfilePopout" class="modal">
            <form class="modal-settings animate" action="/action_page.php">
                <div class="imgholder">
                    <span onclick="document.getElementById('ProfilePopout').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Temporary_plate.svg/601px-Temporary_plate.svg.png" alt="Avatar" class="settings">
                </div>
          
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('ProfilePopout').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>
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

        <div id="MapPopout" class="modal">
            <form class="modalMap-settings animate" action="/action_page.php">
                <div class="imgholder">
                    <span onclick="document.getElementById('MapPopout').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d380513.7159859942!2d-88.01214778988322!3d41.83339250495681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2c3cd0f4cbed%3A0xafe0a6ad09c0c000!2sChicago%2C%20IL!5e0!3m2!1sen!2sus!4v1619970587358!5m2!1sen!2sus" 
                    width="800" height="650" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </form>
        </div>


        <div id="RidesPopout" class="modal">
            <form class="modal-settings animate" action="/action_page.php">
                <div class="imgholder">
                    <span onclick="document.getElementById('RidesPopout').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Temporary_plate.svg/601px-Temporary_plate.svg.png" alt="Avatar" class="settings"> -->
                    <h3>Ride Requests</h3>
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

        <script>
            function acceptRide(){
                alert("Ride accepted successfully!");
                document.getElementById('RidesPopout').style.display='none'
            }

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else { 
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                var latlon = position.coords.latitude + "," + position.coords.longitude;
                
                var img = document.createElement('img');
                var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&zoom=14&size=600x500&sensor=false&key=AIzaSyA3VmqZEnx9lDQue59WTzvmg2DYbppo-Gw";
                document.getElementById('mapholder').innerHTML = "<img src='"+img_url+"'>";
            }
        </script>

    </body>
</html>