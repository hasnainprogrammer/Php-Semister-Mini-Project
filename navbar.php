<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quarter Payment Management</title>
    <!-- BOOTSTRAP CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="navbar.css">
</head>

<body>
    <!-- Navbar Start -->
    <nav>
        <div class="header-sec">
            <div class="logo">
                <h2>QPM</h2>
            </div>
            <div class="navbar">
            <?php
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true){
            ?>
                <a href="index.php">Home</a>
                <a href="payment_info.php">Payment Info</a>
                <a href="logout.php">Logout</a>
            <?php
            }else{
            ?>
                <a href="login.php">Login</a>
                <a href="signup.php">Signup</a>
            <?php
            }
            ?>
            </div>
        </div>


        <!-- Humberger Menu Start -->
        <div class="humberger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="links">
        <?php
          if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true){
        ?>
            <a href="index.php">Home</a>
            <a href="payment_info.php">Payment Info</a>
            <a href="logout.php">Logout</a>
        <?php
        }else{
        ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Signup</a>
        <?php
        }
        ?>
        </div>
        <hr class="line">
    </nav>
    <!-- Humberger Menu End -->
    <!-- Navbar End -->

    <!-- BOOTSTRAP JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    <!-- JavaScript Code -->
    <script>
        //    Humberger Menu Start
        let humbergerMenu = document.querySelector('.humberger-menu');
        let links = document.querySelector('.links');
        humbergerMenu.addEventListener('click', () => {
            links.classList.toggle('show-links');
        })
        // Humberger Menu End
    </script>
</body>

</html>