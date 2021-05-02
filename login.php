<?php
    $host = "127.0.0.1";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "seuberclone";
    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die('Could not connect to the database.');
    }

    session_start();
   
    if(isset($_POST['but_submit'])){

        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
    
        if ($username != "" && $password != ""){
    
            $sql = "SELECT id as cntUsr FROM accounts WHERE username='$username' and password='$password'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
    
            $count = $row['cntUsr'];
    
            if($count > 0){
                $_SESSION['id'] = $id;
            }else{
                echo "Invalid username and password";
            }
        }
    }