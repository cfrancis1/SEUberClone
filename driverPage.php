<!--  -->

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
        <h2 class="apptitle">Driver</h2>

        <div id="outer">
            <div class="inner"><button onclick="window.location.href='checkRides.php'" class="request">View Passenger Requests</button></div>
            <div class="inner"><button onclick="window.location.href='editAccount.php'" class="profile">View/Edit Profile</button></div>
            <div class="inner"><button onclick="document.getElementById('MapPopout').style.display='block'" class="map">View Map</button></div>
            <div class="inner"><button onclick="document.getElementById('RidesPopout').style.display='block'" class="rides">Check Ratings</button></div>
            <div class="inner"><button onclick="window.location.href='logout.php'" class="signout">Sign Out</button></div>
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
        </script>

    </body>
</html>