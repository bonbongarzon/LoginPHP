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
<html>

<head>
    <title>Open Source | Homepage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel='stylesheet' href='https://unpkg.com/emoji.css/dist/emoji.min.css'>
</head>

<body>


    <section class="home-pre-sec">
        <div class="home-header">
            <h1>02</h1>
            <a href="about.php">about</a>
            <span><a href="appoint.php">form</a> x post, 2022</span>
        </div>
    </section>
    <section class="home-cont">
        <div class="label">
            <h1 style="font-size: 50pt;">welcome <strong><?php echo $_SESSION['username']; ?></strong></h1>
        </div>
        <div class="home-state">
        <?php if (isset($_SESSION['username'])): ?>
            <p><a href="index.php?logout='1'"> Logout </a></p>
        <?php endif ?>
            <h1>no extras,</h1>
            <h1>just real <span>solutions</span></h1>
            <h1>we prefer <span>real work</span> </h1>
            <h1> <span> — with receipt </span></h1>
        </div>
    </section>
    <form action="server.php" method="get">
        <button type="submit" name="generate">generate</button>
    </form>
</body>
</html>


    