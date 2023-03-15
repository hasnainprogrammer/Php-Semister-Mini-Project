<?php
error_reporting(0);
// INCLUDES
include "navbar.php";
include "_connection.php";

// Delete Functionality
$success = false;
$sno = $_GET['sno'];
$sql = "DELETE FROM `paymenttb` WHERE `s_no` = '$sno'";
if(mysqli_query($conn, $sql)){
    $success = true;
    header("Location: payment_info.php?delmsg=$success");
}else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Deletion Failed!</strong> Failed to Delete data
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

?>