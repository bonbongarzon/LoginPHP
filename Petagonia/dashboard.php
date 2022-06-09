<?php include ('server.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}


?>




<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="design.css">
    </head>
    <body>
        
        <div class="main-logo"> <a href="http://">Pentagonia</a></div>

        <div class="book-container">
            <?php
            $sql  = "SELECT * FROM pets where CustomerID ='{$_SESSION['username']}'";
            $result = mysqli_query($db,$sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    echo $row ['PetName'] . "<br>" ;
                }
            }
            
            
            
            ?>
        </div>
        <script src="" async defer></script>
    </body>
</html>