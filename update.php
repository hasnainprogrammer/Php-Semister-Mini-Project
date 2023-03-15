<?php
error_reporting(0);
// INCLUDES
include "navbar.php";
include "_connection.php";

// Displaying already stored data in the form
$success = false;
$sno = $_GET['sno'];
$sql = "SELECT * FROM `paymenttb` WHERE `s_no` = '$sno'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$payment = $row['payment'];
$date = $row['date'];

// Update Functionality
$uname = $_POST['uname'];
$upayment = $_POST['upayment'];
$udate = $_POST['udate'];
$success = false;

if(empty($uname) || empty($upayment) || empty($udate)){
    $empty_fields_error = "Please fill all the fields";
}else{
    $sql = "UPDATE `paymenttb` 
            SET `name`='$uname',`payment`='$upayment',`date`='$udate'
            WHERE `s_no` = '$sno'";
    if(mysqli_query($conn, $sql)){
        $success = true;
        header("Location: payment_info.php?updmsg=$success");
    }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Updation Failed!</strong> Failed to update data
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
</style>

<!-- FORM -->
<div class="container my-4">
    <h2 class="my-3">Update Data</h2>
    <p class="error"><?php echo $empty_fields_error; ?></p>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="uname" class="form-control" id="name" placeholder="Enter name" value="<?php echo $name; ?>">
        </div>
        <div class="mb-3">
        <label for="payment" class="form-label">Payment</label>
        <input type="number" name="upayment" class="form-control" id="payment" placeholder="Enter price"  value="<?php echo $payment; ?>">
        </div>
        <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" name="udate" class="form-control" id="date" placeholder="Enter date"  value="<?php echo $date; ?>">
        </div>
        <div class="mb-3">
        <input type="submit" class="form-control bg-dark text-white" value="Update ">
        </div>
    </form>
</div>
