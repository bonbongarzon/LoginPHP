<?php
session_start();
include_once 'header.php';



?>
<link ref="stylesheet" href="style.css">
<section id="register" class="signup-world-container">
    <div class="signup-statue-left">
    </div>
    <div class="signup-right">

        <div class="signup-semi-container">
        <div>
                <h3>Welcome back</h3>
                <p>Welcome back! Please enter your details!</p>
                <br>
            </div>

            <form action="includes/inc.login.php" method="POST">
            <?php if (isset($_GET['error'])) {
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill the empty fields</p>";
                    echo "<p>SABAYYYY-SABAYYYYYY!!</p>";
                }
                else if($_GET["error"] == "Invalid Student Number"){
                    echo "<p>Invalid Student Number!</p>";

                }
                else if($_GET["error"] == "PasswordsDontMatch"){
                    echo "<p>Passwords doesn't match!</p>";

                }
                else if($_GET["error"] == "stmtfailed"){
                    echo "<p>Something went wrong</p>";

                }
                else if($_GET["error"] == "nostd"){
                    echo "<p>Student Number doesn't exist!</p>";

                }
                else if($_GET["error"] == "none"){
                    echo "<p>You have Signed Up!</p>";

                }
                
                } ?>
                <div class="form">
                    <input type="text" name="studentNumber" placeholder="Student Number">
                    <input type="password" name="password" placeholder="Password">
                </div>
                
                <button class="signup-button"type="submit" name="login-submit">Log In</button>
                <a class="login-instead" href="signup.php">Sign Up</a>
            </form>
        </div>
    </div>
</section>
<section><div class="warning "><h1>Warning here</h1></div></section>
</body>
