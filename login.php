<?php
session_start();
error_reporting(0);
// INCLUDES
include "navbar.php";
include "_connection.php";

// Logut success message
if($_GET['logout'] == true){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Logout Successfull! </strong> You are successfully logged out
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
}

// Login Functionality
$success = false;
$username = $_POST['username'];
$password = $_POST['password'];
if(empty($username) || empty($password)){
    $empty_fields_error = "Please fill the fields";
}else{
    $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows == 1){
        $row = mysqli_fetch_assoc($result);
        $pass = $row['password'];
        if(password_verify($password, $pass)){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $success = true;
            header("Location: index.php?loginmsg=$success");
        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Failed!</strong> Invalid credentials
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    // else{
    //     echo "Username not found";
    // }
}
?>

<!-- CUSTOM CSS -->
<style> 
    .container {
        width:50%;
    }
    .error {
        font-family: cursive;
        color:red;
    }

    /*  MEDIA QUERY */
@media (max-width:600px) {
    .container {
        width: 80%;
    }     
}

</style>

<!-- FORM -->
<div class="container">
    <h2 class="my-3">Login</h2>
    <p class="error"><?php echo $empty_fields_error; ?></p>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="mb-3">
            <label for="uname" class="form-label">User Name</label>
            <input type="text" name="username" class="form-control" id="uname" placeholder="Enter Username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
        </div>
        <div class="mb-3">
            <input type="submit" class="form-control bg-dark text-white" value="Login">
        </div>
    </form>
</div>