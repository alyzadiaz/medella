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
        //$summary = $row['facts0'].' '.$row['facts1'].' '.$row['facts2'].' '.$row['facts3'].' '.$row['facts4'].' '.$row['facts5'].' '.$row['facts6'];
        $summary = $row['facts0'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $name;?></title>
        <link rel="stylesheet" type="text/css" href="new-home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="../RESOURCES/lavender.svg">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=News+Cycle&display=swap');
        </style>

        
    </head>
    <body>
        <div id="top-bar">
            <img src="../RESOURCES/m-logo.png" height="150px">
            <button type="button" class="login-button right">
                <img src="../RESOURCES/settings.png" height="30px">
            </button>
        </div>
        <div id="diagnosis-title" class="inside">
            <div class="flex-row">
                <h1><?php echo $name;?></h1>
                
                <img src="../RESOURCES/empty-bookmark.svg" id="bookmark" height="30px">
                <!--<button><i class="fa fa-plus"></i></button>-->
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
            <div  id="diagnosis-summary" class="block left">
                <div class="flex-row">
                    <h2>Summary</h2>
                    <span class="helper"></span><img src="../RESOURCES/speaker.svg" class="audio" alt="Audio option"  height="20px">
                </div>
                <form id="lang-form">
                <select id="select"></select>
                    <!--<input type="image" src="../RESOURCES/speaker.svg" alt="Submit" width="20" height="20">
                    <button id="play" type="submit">Play</button>-->
                    <button onclick="getInnerText('summary1')" id="sumBut" class="audio button">
                        <img src="../RESOURCES/audio button.png" height="25px">
                    </button>
                </form>
                <p id="summary"><?php echo $summary;?></p>
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
        <script src="../JAVASCRIPT-PHP/diagnosis.js"></script>
    </body>
</html>