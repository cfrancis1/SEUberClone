<?php
$name = $_POST['name'];
$make = $_POST['make'];
$model = $_POST['model'];
$maxP = $_POST['maxP'];


if (!empty($name) || !empty($make) || !empty($model) || !empty($maxP)) {
    $host = "127.0.0.1";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "seuberclone";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die('Could not connect to the database.');
    } else {
        $SELECT = "SELECT id From register Where id = ? Limit 1";
        $INSERT = "INSERT INTO register(name, make, model, maxP) values(?, ?, ?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssi", $name, $make, $model, $maxP);
            if ($stmt->execute()) {
                echo "New record inserted sucessfully.";
            }
            else {
                echo $stmt->error;
            }
        }
        else {
            echo "You are already registered.";
        }
        $stmt->close();
        $conn->close();
    }
}
?>

<html>
    <head><link rel="stylesheet" href="UberCSS.css"></head>
    <br>
    <body><button onclick="location.href='index.html'">Back to Home</button></body>
</html>