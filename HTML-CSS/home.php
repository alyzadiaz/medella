<?php 
    $servername = "medella.chle4yzdrgqk.us-east-2.rds.amazonaws.com";
    $username = "admin";
    $password = "Medella123!";
            
    $conn = new mysqli($servername, $username, $password);
            
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    session_start();

    $uid = $_SESSION['share-uid'];
    $name = "";
    $sql = "select First_Name from Medella.User where User_Id ='$uid' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $name = $row["First_Name"];
        }
    } else {
        echo "0 results";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Medella</title>
        <link rel="stylesheet" type="text/css" href="home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
            @import url('https://fonts.googleapis.com/css2?family=News+Cycle&display=swap');
        </style>

        <script src="../JAVASCRIPT/home.js"></script>

        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-analytics.js"></script> 
    </head>
    <body class="body">
        <div id="top-bar">
            <div class="logo">Medella</div>
            <div class="login"><button type="button" class="login-button"><i class="fa fa-user fa-2x" aria-hidden="true"></i></button></div>
        </div>

        <div class="popup">
            <div class="popup-content">
                <div class="close-x">
                    <span class="close"><i class="fa fa-times-circle-o" aria-hidden="true"></i></span>
                </div>
                <div class="login-content center">
                    <!--<span class="profile-img center"></span>-->
                    <p>USER PROFILE</p>
                    <button id="btnLogout" class="btn btn-action center">Log Out</button>
                </div>
            </div>
        </div>
        
        <input id="uid" class="hidden" name="uid">
        <script src="../JAVASCRIPT/logout.js"></script>

        <div id="greeting" class="center">
            <p id="welcome-name">Welcome <?php echo $name?>!</p>
        </div>

        <div id="nav-container" class="center">
            <nav class="center block">
                <a href="search-page.html">Search</a>
            </nav>
            <div class="center block">
                My diagnoses:
            </div>
            <div class="center block">
                Health Tip of the Day (?)
            </div>
        </div>
    </body>
    <footer>
        
    </footer>
</html>

