<?php
session_start();
if (isset($_POST["signup-submit"])) {

    $SN = $_POST["studentNumber"];
    $BD = $_POST["birthday"];
    $PWDA = $_POST["password"];
    $PWDB = $_POST["passwordrpt"];

    require_once 'db.connect.php';
    require_once 'functions.inc.php';


    if (emptyInputSignup($SN,$BD,$PWDA,$PWDB,$PWDB) !==false) {
    header("Location:../signup.php?error=emptyinput");
    exit();
    }
    if (invalidSTN($SN) !==false) {
        header("Location:../signup.php?error=Invalid Student Number");
        exit();
    }
    if (pwdMatch($PWDA,$PWDB) !==false) {
        header("Location:../signup.php?error=PasswordsDontMatch");
        exit();
    }

    $query = "SELECT * FROM students  WHERE studentNumber ='$SN' AND birthdate = '$BD'";
        $result = mysqli_query($conn, $query);
        if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

                createUser($conn,$SN,$BD,$PWDA);

                }
    
                else{

                header("Location:../signup.php?error=nostd");
                 exit();
                }




}
}

//     if (empty($SN) ||empty($BD) ||empty($PWDA) ||empty($PWDB)) {
//         header("Location:../signup.php?error=emptyfields&studentnumber=".$SN."&birthday=".$BD);
//         exit();
//     }
//     else if (!preg_match("/^[0-9]*$/", $SN)){
//         header("Location: ../signup.php?error=invalidstudentnumber=".$SN);
//         exit();
//     }
//     elseif ($PWDA !== $PWDB) {
//         header("Location: ../signup.php?error=passworddontmatch=".$SN."&birthday=".$BD);
//         exit();
//     }
//     else {
//         $sql = "SELECT * FROM students  WHERE studentNumber =? AND birthdate = ?"; //prevents user entering SQL Codes in our DB
//         $stmt = mysqli_stmt_init($conn); //initializing a statement
//         if(!mysqli_stmt_prepare($stmt,$sql)){
//             header("Location: ../signup.php?error=sqlerror"); //finding error in our statement then if there's no error
//             exit();
//         }
//         else{
                                                
//             mysqli_stmt_bind_param($stmt,"ss", $SN,$BD); //to bind variables to the parameter markers of a prepared statement
//             mysqli_stmt_execute($stmt);

//             mysqli_stmt_store_result($stmt); //storing data and making it back to stmt 

//             $resultCheck = mysqli_stmt_num_rows($stmt);
//             if($resultCheck = 0){
//                 header("Location: ../signup.php?error=studentnumberdontexist". $SN);
//                 exit();

//             }

//             else {

//                 $hashedPwd = password_hash($PWDA, PASSWORD_DEFAULT);
//                 // $sql = "INSERT INTO students (studentNumber,birthdate,std_password) VALUES (?,?,?)";

//                 $stmt = mysqli_stmt_init($conn); //initializing a statement
//                     if(!mysqli_stmt_prepare($stmt,$sql)){
//                     header("Location: ../signup.php?error=sqlerror"); //finding error in our statement then if there's no error
//                     exit();
//                     }
//                     else {
//                         // mysqli_stmt_bind_param($stmt,"sss", $SN,$BD,$hashedPwd); //to bind variables to the parameter markers of a prepared statement
//                         // mysqli_stmt_execute($stmt);
//                         $sql = "UPDATE students SET std_password = '$hashedPwd' WHERE studentNumber = $SN";
//                         $insertPwd = mysqli_query($conn,$sql);
//                         header("Location:../signup.php?signup=success");
//                         exit();

//                     }
//             }


//         }
//     }


//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);
// }
// else {
//     header("Location:../signup.php");
//     exit();
// }
























//     if (empty($SN)) {
//         header("Location: signup.php?error=Student Number is required!");
//         exit();
//     }

//     if (empty($BD)) {
//         header("Location: signup.php?error=Birthday is required");
//         exit();
//     }

//     if (empty($PWDA)) {
//         header("Location: signup.php?error=Password is required");
//         exit();
//     }

//     if (empty($PWDB)) {
//         header("Location: signup.php?error=2nd Password is required");
//         exit();
//     }

//     if ($PWDA !== $PWDB) {
//         header("Location: signup.php?error=Passwords didn't match");
//         exit();
//     }
//     else{


// // $BD = strtotime($BD);
// // $BD = date('Y-m-d', $BD);

//         $query = "SELECT * FROM students  WHERE studentNumber ='$SN' AND birthdate = '$BD'";
//         $result = mysqli_query($conn, $query);
//         if($result)
// 			{
// 				if($result && mysqli_num_rows($result) > 0)
// 				{

// 					$user_data = mysqli_fetch_assoc($result);
					
// 					if($user_data['password'] === $password)
// 					{

// 						$_SESSION['user_id'] = $user_data['user_id'];
// 						header("Location: index.php");
// 						die;
// 					}
// 				}
// 			}
//         else {
//             header("location:signup.php?error=Please insert valid information");
//         }

//     }
// }

// else{
//     header("location:signup.php");
// 