<?php
session_start();
if (isset($_POST["login-submit"])) {

    $SN = $_POST["studentNumber"];
    $PWDA = $_POST["password"];

    require_once 'db.connect.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($SN, $PWDA) !== false) {
        header("Location:../login.php?error=emptyinput");
        exit();
    } 
    
    else {
        $query = "SELECT * FROM students  WHERE studentNumber ='$SN'";
        $result = mysqli_query($conn, $query);
        $hashedPwd = password_hash($PWDA, PASSWORD_DEFAULT); // yung ininput na password hinash ko 
            if (mysqli_num_rows($result) >= 1) {
            $row = mysqli_fetch_assoc($result);
            $dbpassword = $row['std_password']; // ito yung nakahash na sa DB
            $checkPWD = password_verify($PWDA,$dbpassword);
            // header("Location:../login.php?error=.$checkPWD");
                if ($checkPWD=== true) {
                    // echo "password matched";
                    $_SESSION['student'] = $SN; 
                    $studentNID = $_SESSION ['student'];
                    header("Location:../index.php");
                }
                else if($checkPWD === false){
                    echo "password dont matched";
                }
            }
            else 
            {
                echo "no student number";
            }

        
        // loginUser($conn, $SN, $PWDA);

    }

}
//     else {
//     header("Location:../login.php");
// }
