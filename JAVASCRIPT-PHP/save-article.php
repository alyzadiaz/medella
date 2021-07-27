<?php
    $servername = "medella.chle4yzdrgqk.us-east-2.rds.amazonaws.com";
    $username = "admin";
    $password = "Medella123!";
                    
    $conn = new mysqli($servername, $username, $password);
                    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $uid = $_POST['uid'];
    $disease = $_POST['d-id'];
    $checked = $_POST['operation'];
    
    $sql;

    if($checked=='on'){
        $sql = "UPDATE Medella.User SET saved_articles=CONCAT(saved_articles,'$disease/') WHERE User_Id='$uid'";
    }else{
        $sql = "UPDATE Medella.User SET saved_articles=REPLACE(saved_articles,'$disease/','') WHERE User_Id='$uid'";
    }

    echo $sql;
    
   
?>