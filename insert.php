<?php
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$ccard = $_POST['ccard'];
$type = $_POST['type'];

if (!empty($username) || !empty($password) || !empty($name) || !empty($ccard) || !empty($type)) {
    $host = "127.0.0.1";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "seuberclone";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die('Could not connect to the database.');
    } else {
        $SELECT = "SELECT username From accounts Where username = ? Limit 1";
        $INSERT = "INSERT INTO accounts(username, password, name, ccard, type) values(?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($username);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssis", $username, $password, $name, $ccard, $type);
            if ($stmt->execute()) {
                echo "New record inserted sucessfully.";
            }
            else {
                echo $stmt->error;
            }
        }
        else {
            echo "This username is taken.";
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