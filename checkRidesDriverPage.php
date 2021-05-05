
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="UberCSS.css">
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false" src="//maps.google.com/maps/api/js?sensor=false"></script>
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
            <div class="inner"><button onclick="window.location.href='driverPage.php'" class="request">Home</button></div>
            <div class="inner"><button onclick="window.location.href='logout.php'" class="signout">Sign Out</button></div>
        </div>

        <br>

        <script>
            function acceptRide(){
                alert("Ride accepted successfully!");
                document.getElementById('RidesPopout').style.display='none'
            }
        </script>




<?php
session_start();
require_once "config.php";


// if($class_number == "" )
//  	$result = mysqli_query($conn,"SELECT * FROM class WHERE class_name LIKE '%$class_name%' AND department LIKE '%$department%'");
// elseif($class_name == "")
// 	$result = mysqli_query($conn,"SELECT * FROM class WHERE class_number LIKE '%$class_number%' AND department LIKE '%$department%'");
// else
// 	$result = mysqli_query($conn,"SELECT * FROM class WHERE class_name LIKE '%$class_name%' AND class_number LIKE '%$class_number%' AND department LIKE '%$department%'");

$sql = "Select * FROM ride_request INNER JOIN accounts ON ride_request.uid=accounts.id";    
$result=mysqli_query($link, $sql);

if($result->num_rows > 0){
echo "<table id='rideRequestList' border='1' width='80%' cellpadding='5' cellspacing='5' style='margin-left: auto; margin-right: auto;'>
<tr style='background: #eee'>
<th>Name</th>
<th>Passengers</th>
<th>Rating</th>
<th>Accept?</th>
</tr>";


	while($row = mysqli_fetch_array($result))
	{
	echo "<tr>";
	echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['passengers'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
	echo "<td>" . '<button type="button" onclick="acceptRide()" class="acceptbtn">Accept</button>'; 
    //'<input type="checkbox" id=' . $classID . 'name=' . $classID . '>' . "</td>";
	echo "</tr>";
	}
}
else {echo "No results found.";}

echo "</table> <br>";

mysqli_close($conn);
?>

    </body>
</html>