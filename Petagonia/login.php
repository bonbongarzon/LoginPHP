<?php include('server.php'); ?>
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
    <title> Login Page </title>
</head>
<header class="main-header">
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
        <form method="post" action="server.php">
            <div class="loginform">
                <h1>Owner's Login</h1>
                <p>Hey, Enter your details to get sign in to your account</p>
                <?php if (isset($_GET['error'])) {
                if($_GET["error"] == "nousername-signup"){
                    echo "<p>Username is Empty</p>";
                }
                else if($_GET["error"] == "nopwd-signup"){
                    echo "<p>Password is Empty!</p>";

                }
                else if($_GET["error"] == "notmatch"){
                    echo "<p>Oopss! Username and Password don't match.</p>";

                }
        
                } ?>

                <input type="text" name="username" id="" placeholder="Username">
                <input type="password" name="password" id="" placeholder="Password">
                <span>Having trouble during sign up?</span>
                <button type="submit" name="login">Log in</button>
                <p class="stateA">Don't have an Account? <a href="register.php">Sign up Here</a></p>
            </div>
        </form>
    </section>
</body>

</html>