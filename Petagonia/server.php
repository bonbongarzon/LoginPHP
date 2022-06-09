<?php
session_start();

$username = "";
$email = "";

$db = mysqli_connect('localhost', 'root', "", 'petagoniadb');

// when register BUTTON is CLICKED
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']); // ireremove lahat ng special characters
    $email = mysqli_real_escape_string($db, $_POST['email']);// ireremove lahat ng special characters
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);// ireremove lahat ng special characters
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);// ireremove lahat ng special characters

   //ERROR HANDLERS
    if (empty($username)) {

        header("Location:signup.php?error=nousername-login");
    }
    if (empty($email)) {
        header("Location:signup.php?error=noemail-login");
    }
    if (empty($password_1)) {
        header("Location:signup.php?error=nopassword-login");
    }
    if ($password_1 != $password_2) {
        header("Location:signup.php?error=twopasswordnotmatch");
    }



    // END OF ERROR HANDLER


    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $insertdata = "SELECT * FROM customers WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $insertdata);
    $user = mysqli_fetch_assoc($result);

       //ERROR HANDLERS
    if ($user) { // if user exists
        if ($user['username'] === $username) {
            echo "<script>alert('Username is required');document.location='register.php'</script>";

            if ($user['email'] === $email) {
                echo "<script>alert('Password is required');document.location='register.php'</script>";
            }
        }
    }

    // END OF ERROR HANDLER



    //No error happens, iinsert na siya sa database 
        $password = md5($password_2); //ENCRYPTION ng password
        $sql = "INSERT INTO customers (username, passcode, email) 
                     VALUES ('$username', '$password','$email' )";
        mysqli_query($db, $sql);
        $_SESSION['username'] = $username; //Session variable 
        $_SESSION['success'] = " You are now logged in";
        header('location: index.php'); //CONTROL or PROCEED THE USER TO LOCATION 

    
}











// when login BUTTON is CLICKED
if (isset($_POST['login'])) 

    {
            $username = $_POST['username'];
            $password = $_POST['password'];
       //ERROR HANDLERS
    if (empty($username)) {

        header("Location:login.php?error=nousername-signup");
    } else if (empty($password)) {
        header("Location:login.php?error=nopwd-signup");
    } else {

          // END OF ERROR HANDLER
    $username = stripcslashes($username);  // ireremove niya yung backlash (\) characters sa username
    $password = stripcslashes($password);  // ireremove niya yung backlash (\) characters sa password


    //to prevent from mysqli injection  
    $username = mysqli_real_escape_string($db, $username);// ireremove niya yung special characters sa username
    $password = mysqli_real_escape_string($db, $password);// ireremove niya yung special characters sa password
    $hashed = md5($password);  //ENCRYPTION ng password
    $sql = "select * from Customers where username = '$username' AND passcode = '$hashed' ";
    $result = mysqli_query($db, $sql);  // ieexecute then ilalagay sa variable result
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); // gagawing array ang result
    $count = mysqli_num_rows($result); // bibilangin yung result by row
    if ($count >= 1) {  // kapag may nakuhang isang row then ieexecute niya yung nasa baba
        $_SESSION['username'] = $username; // gagawa ng session variable o global variable dipende sa nilagay na username
        header('location: index.php'); // pupunta sa index.php
    } 
    else { // kapag walang row ang nakuha then ito yung lalabas 
        header("Location:login.php?error=notmatch");
    }
}
}


if (isset($_POST['pageA'])) {

    //get from form to VARIABLE to SESSION VARIABLE
    $petname = $_POST['petname'];
    $petbreed = $_POST['petbreed'];
    $petGender = $_POST['petGender'];
    $petbdate = $_POST['petbdate'];
    $concern = $_POST['concerns'];
    // Error Handlers
    if (empty($petname)) {
        header("Location:appoint.php?error=nopetname");
    } else if (empty($petbreed)) {
        header("Location:appoint.php?error=nopetbreed");
    }
    else if (empty($petGender)) {
        header("Location:appoint.php?error=nopetgender");
    }
    else if (empty($petbdate)) {
        header("Location:appoint.php?error=nopetdate");
    }  else {
    // End of Error Handlers
    if ($petGender == "Boy") {
        $_SESSION['petPronounsA'] = "his";
        $_SESSION['petPronounsB'] = "him";
    }
    if ($petGender == "Girl") {
        $_SESSION['petPronounsA'] = "her";
        $_SESSION['petPronounsB'] = "she";
    } //FROM VARIABLE TO SESSION
    $_SESSION['petname'] = $petname;
    $_SESSION['petbreed'] = $petbreed;
    $_SESSION['petGender'] = $petGender;
    $_SESSION['petbdate'] = $petbdate;
    $_SESSION['concern'] = $concern;

    header("location: petHealth.php"); // proceed to page 
}
}



if (isset($_POST['pageB'])) {
    //GET FROM FORM
    $DistemperMonth = $_POST['DistemperMonth'];
    $DistemperYear = $_POST['DistemperYear'];
    $RabiesMonth = $_POST['RabiesMonth'];
    $RabiesYear = $_POST['RabiesYear'];
    $BordatellaMonth = $_POST['BordatellaMonth'];
    $BordatellaYear = $_POST['BordatellaYear'];
    $vetname = $_POST['vetname'];
    $vetAreaCode = $_POST['vetAreaCode'];
    $vetcontact = $_POST['vetcontact'];


    // ERROR HANDLER
    if ($DistemperMonth == "month") {
        header("Location:petHealth.php?error=A");
    } else if ($DistemperYear == "year") {
        header("Location:petHealth.php?error=B");
    }else if ($RabiesMonth == "month") {
        header("Location:petHealth.php?error=C");
    }else if ($RabiesYear == "year") {
        header("Location:petHealth.php?error=D");
    }else if ($BordatellaMonth == "month") {
        header("Location:petHealth.php?error=E");
    }else if ($BordatellaYear == "year") {
        header("Location:petHealth.php?error=F");
    }else {
        // WHEN NO ERROR
        //Combine the variables 
    $vetcontact = $vetAreaCode . '' . $vetcontact; 
    $Distemper = $DistemperMonth . '/' . $DistemperYear;
    $Rabies = $RabiesMonth . '/' . $RabiesYear;
    $Bordatella = $BordatellaMonth . '/' . $BordatellaYear;


        // Transfer to Session Variable
    $_SESSION['Distemper'] = $Distemper;
    $_SESSION['Rabies'] = $Rabies;
    $_SESSION['Bordatella'] = $Bordatella;
    $_SESSION['vetname'] = $vetname;
    $_SESSION['vetcontact'] = $vetcontact;
        // Proceed to the page
    header("location:personaldetails.php");
    }
}

if (isset($_POST['pageC'])) {

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $ownercode = $_POST['ownercode'];
    $ownercontact = $_POST['ownercontact'];


    $ownercontact = $ownercode . $ownercontact;


    $Street = $_POST['Street'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zip = $_POST['Zip'];
    $Country = $_POST['Country'];

    $ownderAddress = $Street . ', ' . $City . ', ' . $State . ', ' . $Country . '.' . $Zip;

    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['ownercontact'] = $ownercontact;
    $_SESSION['ownderAddress'] = $ownderAddress;

    $final_username = $_SESSION['username'];

    //Pet's Basic Information PAGE A
    $final_petGender =  $_SESSION['petGender'];
    $final_petname =  $_SESSION['petname'];
    $final_petbreed =  $_SESSION['petbreed'];
    $final_petbdate =  $_SESSION['petbdate'];
    $final_concern =  $_SESSION['concern'];

    //Veneterinary Records PAGE B
    $final_Distemper =  $_SESSION['Distemper'];
    $final_Rabies =  $_SESSION['Rabies'];
    $final_Bordatella =  $_SESSION['Bordatella'];
    $final_vetname =   $_SESSION['vetname'];
    $final_vetcontact =   $_SESSION['vetcontact'];

    //Owners Information PAGE C
    $final_firstname = $_SESSION['firstname'];
    $final_lastname = $_SESSION['lastname'];
    $final_ownercontact =   $_SESSION['ownercontact'];
    $final_ownderAddress =   $_SESSION['ownderAddress'];


    $sql = "UPDATE Customers set First_Name = '$final_firstname', Last_Name='$final_lastname', M_Number='$final_ownercontact',Address = '$final_ownderAddress'  WHERE username = '$final_username ';";
    mysqli_query($db, $sql);

    $petsql = "INSERT INTO pets (CustomerID,PetName,PetBreed,PetGender,PetBirthdate,PetConcern,DistemperDate,RabiesDate,BordatellaDate,VetName,VetContact) 
VALUES ('$final_username','$final_petname','$final_petbreed','$final_petGender','$final_petbdate ','$final_concern','$final_Distemper','$final_Rabies','$final_Bordatella','$final_vetname','$final_vetcontact')";
    mysqli_query($db, $petsql);


    header("location:dashboard.php");
}


// echo print_r($_SESSION, TRUE);
// echo $_SESSION['username'];
// echo $_SESSION['petGender'];
// echo $_SESSION['petname'];
// echo $_SESSION['petbreed'];
//  echo $_SESSION['petbdate'];
//  echo $_SESSION['concern'];
//     echo $_SESSION['Distemper'] ;
//     echo $_SESSION['Rabies'] ;
//     echo $_SESSION['Bordatella'] ;
//     echo $_SESSION['vetname'] ;
//     echo $_SESSION['vetcontact'];
//     echo $_SESSION['firstname'];
// echo $_SESSION['lastname'];
// echo $_SESSION['ownercontact'];
// echo $_SESSION['ownderAddress'];









// when rlogout BUTTON is CLICKED
if (isset($_GET['logout'])) {
    session_destroy();
    header('location: login.php');
}


if (isset($_GET['generate'])) {
    $generate = rand(10000, 99999);

    echo $generate;
}
