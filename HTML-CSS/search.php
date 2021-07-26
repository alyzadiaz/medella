<?php
    $servername = "medella.chle4yzdrgqk.us-east-2.rds.amazonaws.com";
    $username = "admin";
    $password = "Medella123!";
                    
    $conn = new mysqli($servername, $username, $password);
                    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name,id FROM Medella.disease ORDER BY name";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search</title>
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
        <div class="inside">
            <input class="search-input" type="text">
            <button type="submit" id="search_button"><i class="fa fa-search fa-2x"></i></button>
        </div>
        <div class="search-body">
            <div class="search-results">
                <h1>Search Results</h1>
                
                <div class="results-box">
                    <?php while ($row = mysqli_fetch_array($result)): ?>
                    <?php 
                        $name = $row['name'];
                        $id = $row['id'];
                    ?>

                    <form class="id-form" action="../HTML-CSS/diag.php" method="post">
                        <button class="underline-button result"><?php echo $name;?></button>
                        <input class="hidden" type="number" name="id" value=<?php echo $id?>>
                    </form>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <script src="../JAVASCRIPT-PHP/search.js"></script>
    </body>
    <footer>
        
    </footer>
</html>