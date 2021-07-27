<?php
    $id = $_POST["id"];

    $servername = "medella.chle4yzdrgqk.us-east-2.rds.amazonaws.com";
    $username = "admin";
    $password = "Medella123!";
                    
    $conn = new mysqli($servername, $username, $password);
                    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Medella.disease WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)):
        $name = $row['name'];
        $id = $row['id'];
        $treatment = $row['treatment'];
        $symptoms = $row['symptoms'];
        $summary = $row['facts0'].' '.$row['facts1'].' '.$row['facts2'].' '.$row['facts3'].' '.$row['facts4'].' '.$row['facts5'].' '.$row['facts6'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $name;?> - Medella</title>
        <link rel="stylesheet" type="text/css" href="new-home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="../RESOURCES/lavender.ico">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=News+Cycle&display=swap');
        </style>

        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-analytics.js"></script> 

        <script src="../JAVASCRIPT-PHP/home-login-button.js"></script>
    </head>
    <body>
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
                    <img src="../RESOURCES/m-logo.png" class="center" height="80px" width="160px">
                    <div id="guest">
                        <div class="container">
                            <input id ="txtEmail" type="email" placeholder="Email" oninput="clearError('txtEmail')">
                
                            <input id ="txtPassword" type="password" placeholder="Password" oninput="clearError('txtPassword')">
                            
                            <div class="container flex">
                                <button id="btnLogin" type="submit" class="btn btn-action fade-in center">Log In</button>
                                <button id="btnSignUp" type="submit" class="btn btn-secondary fade-in center">Sign Up</button>
                            </div>
                        </div>
                        <script src="../JAVASCRIPT-PHP/login.js"></script>
                    </div>
                    <div id="registered">
                        <p class="center">USER PROFILE</p>
                        <button id="btnLogout" class="btn btn-action fade-in">Log Out</button>

                        <script src="../JAVASCRIPT-PHP/logout.js"></script>
                    </div>
                </div>
            </div>
        </div>
        <script src="../JAVASCRIPT-PHP/check-login.js"></script>

        <div id="diagnosis-title" class="inside">
            <div class="flex-row">
                <h1><?php echo $name;?></h1>
                
                <button id="bookmark">
                    <img src="../RESOURCES/empty-bookmark.svg" id="empty-mark" height="30px">
                    <img src="../RESOURCES/filled-bookmark.svg" id="filled-mark" class="none" height="30px">
                </button>

                <form id="submit-save" class="none" action="../JAVASCRIPT-PHP/save-article.php" method="post">
                    <input id="uid" type="text" name="uid">
                    <input type="number" name="d-id" value=<?php echo $id;?>>
                    <input id="check" type="checkbox" name="operation"> <!--checked = adding, unchecked = remove-->
                </form>
            </div>
            <p>Diagnosis #ID: <?php echo $id;?></p>
            <div id="google_translate_element"></div>
            
            <script type ="text/javascript">
                function googleTranslateElementInit(){
                    new google.translate.TranslateElement(
                        {pageLanguage: 'en'},
                        'google_translate_element'
                    );
                }            
            </script>

            <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
        
        </div>
        <div class="flex-row diagnosis-body">
            <div id="diagnosis-summary" class="block left">
                <div class="flex-row">
                    <h2>Summary</h2>
                </div>
                <form>
                    <select id="select"></select>
                    <input type="image" src="../RESOURCES/speaker.svg" alt="Submit" height="20px">
                </form>
                <p><?php echo $summary;?></p>
            </div>
            <div id="diagnosis-treatment" class="block right">
                <div class="flex-row">
                    <h2>Symptoms</h2>
                    <img src="../RESOURCES/speaker.svg" class="audio" alt="Audio option"  height="20px">
                </div>
                <p><?php echo $symptoms;?></p>               
            </div>
            <div id="diagnosis-treatment" class="block right">
                <div class="flex-row">
                    <h2>Treatment</h2>
                    <img src="../RESOURCES/speaker.svg" class="audio" alt="Audio option"  height="20px">
                </div>
                <p><?php echo $treatment;?></p>
            </div>
        </div>
        <?php endwhile; ?>
        <script src="../JAVASCRIPT-PHP/bookmark.js"></script>
        <script src="../JAVASCRIPT-PHP/diagnosis.js"></script>
        
    </body>
</html>
