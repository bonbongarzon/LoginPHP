<?php include('server.php'); 
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
<header>
    <nav>
        <div class="logo-contA">
            <div class="logo-placeA">

                <span>Petagonia</span>

            </div>
            <a href="mailto:">petagonia@pitch.ph</a>
        </div>
        <ul>
            <li><a href="#">Sign in</a></li>
            <li class="buttonheader"><a href="#">The Team</a></li>
        </ul>

    </nav>
</header>

<body>
    <section class="first-section">
    <form action="server.php" method="post">
        <div class="signupform">
            
                <h1>Sign up here</h1>
                <p>Hey, Enter your details to get sign up for your account</p>
                
                <?php if (isset($_GET['error'])) {
                if($_GET["error"] == "nousername-login"){
                    echo "<p>Username is Required</p>";
                }
                else if($_GET["error"] == "noemail-login"){
                    echo "<p>Email is Required</p>";

                }
                else if($_GET["error"] == "nopassword-login"){
                    echo "<p>Password is Required</p>";

                }
                else if($_GET["error"] == "twopasswordnotmatch"){
                    echo "<p>Passwords doesn't match!</p>";

                }
                
                } ?>
                <input type="text" name="username" id="" value="<?php echo $username; ?>" placeholder="Username">
                <input type="email" name="email" id="" value="<?php echo $email; ?>" placeholder="Email">
                <input type="password" name="password_1" id="" placeholder="Password">
                <input type="password" name="password_2" id="" placeholder="Confirm Password">
                <span>Having trouble during sign up?</span>
                <button type="submit" name="register">Sign up</button>

                <p class="stateA">Already registered? <a href="login.php">Login Here</a></p>

        </div>
    </form>
    </section>
</body>

</html>