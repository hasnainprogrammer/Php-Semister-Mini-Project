<?php
error_reporting(0);
// INCLUDES
include "navbar.php";
include "_connection.php";

// Signup Functionality
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
if(empty($username) || empty($password) || empty($cpassword)){
    $empty_fields_error = "Please fill all the fields";
}
else{
    if($password == $cpassword){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`username`, `password`)
            VALUES ('$username','$hash')";
        if(mysqli_query($conn, $sql)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> Signup successfull 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Username already exist!</strong> Try another user name
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }else{
        $incorrect_password_error = "Password should matched";
    }
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
    <h2 class="my-3">Signup</h2>
    <p class="error"><?php echo $empty_fields_error; ?></p>
    <p class="error"><?php echo $incorrect_password_error; ?></p>
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
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confim Password">
        </div>
        <div class="mb-3"> 
            <input type="submit" class="form-control bg-dark text-white" value="Signup">
        </div>
    </form>
</div>