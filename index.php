<?php

include'system/config.php';
include'system/session.php';

$name = 'Name';
$total = '0';

if($IS_AUTH){
    $isnotAuth = "none";
    $isAuth = "inline-block";

    $user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `user` WHERE `email`='".$_SESSION['login']."'"));
    $name=$user['name'];

    $cart = mysqli_fetch_array(mysqli_query($con,"SELECT `id` FROM `cart` WHERE `user`='".$user['id']."' AND `payment`='0'"));
    $items = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) AS 'NUM' FROM `items` WHERE `cart`='".$cart['id']."'"));
    $total = $items['NUM'];
}else{
    $isnotAuth = "inline-block";
    $isAuth = "none";
}

$error = '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | Durga Prasad</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="stylesheet" type="text/css" media="screen" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>
<body>
    <header>
        <h1>Your DP (Durga Prasad)</h1>    
    </header>

    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between" id="myNavW">            
            <a class="py-2 d-none d-md-inline-block" href="index.php">Home</a>
            <div class="py-2 d-none d-md-inline-block" id="myNav">
                <a class="dropbtn" href="#">Menu</a>
                <div class="dropdown-content">
                    <a href="item.php?cat=1">South indian food</a>
                    <a href="item.php?cat=2">Panjabi food</a>
                    <a href="item.php?cat=3">Jain food</a>
                    <a href="item.php?cat=4">Chinese food</a>
                    <a href="item.php?cat=5">Vegan food</a>
                </div>
            </div>            
            <a class="py-2 d-none d-md-inline-block" href="contact.php">Contact Us</a>
            <a class="py-2" href="login.php" style="display: <?php echo $isnotAuth; ?>;">Login</a>
            <div class="py-2" id="myNav" style="display: <?php echo $isAuth; ?>;">
                <a class="dropbtn" href="#"><i class="far fa-user-circle"></i> <?php echo $name; ?></a>
                <div class="dropdown-content">
                    <a href="checkout.php">Cart(<?php echo $total; ?>)</a>
                    <a href="system/logout.php">Logout</a>
                </div>
            </div>
            <a class="far fa-comments" style='font-size:24px' href="chatbot/bot.php"></a>            
        </div>
    </nav>

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-normal">WELCOME TO</h1>
            <p class="lead font-weight-normal">HOTEL DURGA PRASAD</p>
        </div>        
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>    
    <script src="js/sweetalert.min.js"></script>
    <script type="text/javascript">
        <?php echo $error; ?>
    </script>
</body>
</html>