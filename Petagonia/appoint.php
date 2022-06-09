<?php include('server.php'); 
// if (!isset($_SESSION['username'])) {
//     header('location: login.php');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <title> Registration </title>
</head>



<body>
    <section class="appoint-main-sect">
        <div class="main-cont-app">
            <div class="form-cont">
                <div class="main-logo"> <a href="http://">Pentagonia</a></div>
                <div class="mini-form">
                    <h1>Let's partner up</h1>
                    <p>Let’s take care of your pet, together.</p>
                    <form method="POST" action="server.php">

                    <?php if (isset($_GET['error'])) {
                if($_GET["error"] == "nopetname"){

                    echo "<p>Pet Name is Required</p>";
                }
                else if($_GET["error"] == "nopetbreed"){
                    echo "<p>Pet Breed Required</p>";

                }
                else if($_GET["error"] == "nopetgender"){
                    echo "<p>Please enter your Pet's Gender</p>";

                }
                else if($_GET["error"] == "nopetdate"){
                    echo "<p>Pet Birthdate is Require!</p>";

                }
                
                } ?>
                       
                        <input type="text" name="petname"  required placeholder="Pet's Name" >
                        <input type="text" name="petbreed" requiredplaceholder="Breed">
                        <div class="genderplace">
                            <input class="radio" type="radio" name="petGender"  required value="Boy" />
                            <label for="petGender">Boy</label>
                            <input class="radio" type="radio" name="petGender" required value="Girl" />
                            <label for="petGender">Girl</label>
                        </div>
                        <div class="birthdayplace">
                            <label for="petbdate">Birthdate:</label>
                            <input type="date" name="petbdate" required id="">
                        </div>
                        <br>
                        <textarea name="concerns" id="" cols="20" rows="5">How can we help you?</textarea>
                        <button type="submit" name="pageA">Proceed</button>
                    </form>
                </div>
            </div>

            <div class="image-cont"></div>
        </div>

    </section>
    <!-- <section class="appoint">
        <div class="main-logo"> <a href="http://">Pentagonia</a></div>
        <div class="main-form-cont">
            <h1>Book an Appointment</h1>
            <p>Please provide all required fields below</p>

            <div class="petInfo-cont">
                    <label for="">Pet's Name</label>
                    <input type="text" name="petname" id="">
                    <label for="petbreed">Pet Breed</label>
                    <input type="text" name="petbreed" id="">
                    
                </div>
        
        </div>

    </section> -->

</body>

</html>