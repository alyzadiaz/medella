<?php 
    $servername = "medella.chle4yzdrgqk.us-east-2.rds.amazonaws.com";
    $username = "admin";
    $password = "Medella123!";
                    
    $conn = new mysqli($servername, $username, $password);
                    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
            
    session_start();

    $uid = $_POST['uid'];
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
        <link rel="stylesheet" type="text/css" href="new-home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="../RESOURCES/lavender.ico">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=News+Cycle&display=swap');
        </style>

        <script src="../JAVASCRIPT-PHP/home-login-button.js"></script>

        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-analytics.js"></script> 
    </head>
    <body class="body">
        <div id="top-bar">
            <img src="../RESOURCES/m-logo.png" height="150px">
            <button type="button" class="login-button right">
                <img src="../RESOURCES/settings.png" height="30px">
            </button>
        </div>
        
        <div class="popup">
            <div class="popup-content">
                <div class="close-x">
                    <span class="close"><i class="fa fa-times-circle-o" aria-hidden="true"></i></span>
                </div>
                <div class="login-content center">
                    <p class="center">USER PROFILE</p>
                    <button id="btnLogout" class="btn btn-action fade-in">Log Out</button>
                </div>
            </div>
        </div>
        
        <form id="form" name="id-form" class ="hidden" method="post">
            <input id="uid" name="uid">
        </form>

        <script src="../JAVASCRIPT-PHP/logout.js"></script>

        <script type="text/javascript">
            setTimeout(() => {
                var idText = document.getElementById("uid").value;
            }, 275);
        </script>

        <div id="greeting" class="center">
            <p id="welcome-name">Welcome, <?php echo $name?></p>

            <div id="nav-container">
            <nav class="block">
                <a href="search.php">Search <i class="fa fa-search" aria-hidden="true"></i></a>
            </nav>
            <div class="block">
                <p id="bottom-border">Saved Articles</p>
                <div class="spacer"></div>
                <div id="saved-articles">

                    <?php 
                        $query_articles = "SELECT saved_articles FROM Medella.User WHERE User_Id='$uid'";
                        $articles_results = mysqli_query($conn, $query_articles);

                        if($articles_results->num_rows==0){
                    ?>
                        <h1 id="no-results">No articles saved.</h1>
                    <?php
                        }
                        
                        while($row = mysqli_fetch_array($articles_results)):
                        //load articles that post to diagnosis.php
                        endwhile;
                    ?>

                </div>
            </div>
        </div>
    </body>
    <footer>
        
    </footer>
</html>

