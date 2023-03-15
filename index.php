<?php
session_start();
error_reporting(0);
// INCLUDES
include "navbar.php";
include "_connection.php";

// Check wheather the user logged in or not
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header('Location: login.php');
}

// Login success message
if($_GET['loginmsg'] == true){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Login Successfull! </strong> You are successfully logged in 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
}

// Add Payment
$name = $_POST['name'];
$payment = $_POST['payment'];
$date = $_POST['date'];
if(empty($name) || empty($payment) || empty($date)){
    $empty_fields_error = "Please fill all the fields";
}else{
    $sql = "INSERT INTO `paymenttb`(`name`, `payment`, `date`)
            VALUES ('$name','$payment','$date')";
    if(mysqli_query($conn, $sql)){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulation!</strong> Record has been inserted successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Insertion Failed!</strong> Failed to insert record
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
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
<div class="container my-4">
    <h2 class="my-3">Add Payment</h2>
    <p class="error"><?php echo $empty_fields_error; ?></p>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
        </div>
        <div class="mb-3">
        <label for="payment" class="form-label">Payment</label>
        <input type="number" name="payment" class="form-control" id="payment" placeholder="Enter price">
        </div>
        <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" name="date" class="form-control" id="date" placeholder="Enter date">
        </div>
        <div class="mb-3">
        <input type="submit" class="form-control bg-dark text-white" value="Submit ">
        </div>
    </form>
</div>
