<?php
    $servername = "medella.chle4yzdrgqk.us-east-2.rds.amazonaws.com";
    $username = "admin";
    $password = "Medella123!";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $uid = $_GET["u-id"];
    $f_name = $_GET["first-name"];
    $l_name = $_GET["last-name"];
    $address = $_GET["addy"];
    $email = $_GET["email"];
    $zip = $_GET["zip"];
    $state = $_GET["state"];
    $country = $_GET["country"];

    $sql = "INSERT INTO Medella.User (User_Id, First_Name, Last_Name, Email, Street, Zip, User_State, Country) 
            VALUES ('$uid', '$f_name', '$l_name', '$email', '$address', '$zip', '$state', '$country')";
    $result = $conn->query($sql);

    $conn->close();
    header('Location: ../HTML-CSS/pull-user.html');
?>