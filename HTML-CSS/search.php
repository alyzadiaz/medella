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
            <form action="search.php" method="get">
                <input class="search-input" type="text" name="search-query">
                <button type="submit" id="search_button"><i class="fa fa-search fa-2x"></i></button>
            </form>
        </div>
        <?php 
            
        ?>
        <div class="search-body">
            <div class="search-results">
                <h1>Search Results</h1>
                
                <div class="results-box">
                    <?php 
                        $search_query;
                        if(isset($_GET['search-query'])){
                            $search_query = $_GET['search-query'];
                            $new_search_query = "SELECT name, id FROM Medella.disease where LOWER(name) like '%$search_query%' ORDER BY name";
                            $new_results = mysqli_query($conn, $new_search_query);

                            if($new_results->num_rows==0){
                    ?>
                                <h1 id="no-results">No results found.</h1>
                    <?php
                            }

                            while ($row = mysqli_fetch_array($new_results)):
                                $new_name = $row['name'];
                                $new_id = $row['id'];
                    ?>

                        <form class="id-form" action="../HTML-CSS/diagnosis.php" method="post">
                            <button class="underline-button result"><?php echo $new_name;?></button>
                            <input class="hidden" type="number" name="id" value=<?php echo $new_id?>>
                        </form>

                    <?php 
                        endwhile; 
                        }else{
                            while ($row = mysqli_fetch_array($result)): 
                                $name = $row['name'];
                                $id = $row['id'];
                    ?>
                        <form class="id-form" action="../HTML-CSS/diagnosis.php" method="post">
                            <button class="underline-button result"><?php echo $name;?></button>
                            <input class="hidden" type="number" name="id" value=<?php echo $id?>>
                        </form>

                    <?php endwhile; }?>

                    <a href="../HTML-CSS/search.php" class="redo-search"><img src="../RESOURCES/left-arrow.svg" height="35px"></a>
                </div>
            </div>
        </div>
        <script src="../JAVASCRIPT-PHP/search.js"></script>
    </body>
    <footer>
        
    </footer>
</html>