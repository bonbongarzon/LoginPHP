<?php

function check_login($conn){
    if (isset($_SESSION['student'])) {
        $studentNID = $_SESSION ['student']; //making a new variable for the session na may value na student number 
        $query = "SELECT * from students where studentNumber ='$studentNID'"; // hahanapin niya sa table

        $result = mysqli_query($conn,$query); //execution   

        if($result && mysqli_num_rows($result)>0){ //kapag greater than 0 then makakpasok siya?
                $user_data = mysqli_fetch_assoc($result); //information ng user papasok as array
                return $user_data;
            }
    }

    header("location:login.php");
    die;
}



function emptyInputSignup($SN, $BD,$PWDA,$PWDB){
 $result;
    if (empty($SN) || empty($BD) || empty($PWDA) || empty($PWDB) ) {
     $result = true;
 }
 else {
     $result = false;
 }
 return $result;
}

function invalidSTN($SN){
    $result;
       if (!preg_match("/^[0-9]*/", $SN)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
   }

   function pwdMatch($PWDA,$PWDB){
    $result;
    if ($PWDA !== $PWDB) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
    }

function stdExist($conn,$SN){
        $sql = "SELECT * FROM  students WHERE studentNumber = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) { 

            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $SN,$PWDA);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }

function createUser($conn,$SN,$BD,$PWDA){
        $hashedPwd = password_hash($PWDA, PASSWORD_DEFAULT);
        $sql = "UPDATE students SET std_password ='$hashedPwd' WHERE studentNumber = '$SN' AND birthdate = '$BD'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) { 

            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location:../signup.php?error=none");
        exit();
    }

    function emptyInputLogin($SN, $PWD){
        $result;
           if (empty($SN) || empty($PWD)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
       }


       function loginUser($conn,$SN,$PWDA){

    
        $hashedPwd = password_hash($PWDA, PASSWORD_DEFAULT);
        $query = "SELECT * FROM students  WHERE studentNumber ='$SN' AND std_password = '$hashedPwd'";
        $result = mysqli_query($conn, $query);


        if(mysqli_num_rows($result)>=1){
            header("location:../login.php?error=sabaysabay");
            // $row = mysqli_fetch_assoc($result);
            // if($row['studentNumber'] === $SN && $row['std_password'===$hashedPwd]){
            //     header("Location:index.php");

            // }
            }

        }