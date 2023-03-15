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

// Update success message
if($_GET['updmsg'] == true){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulation!</strong> Record has been Updated successfully
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

// Delete success message
if($_GET['delmsg'] == true){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulation!</strong> Record has been Deleted successfully
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

<style>
  .inner-container {
    width: 70%;
  }

  label {
    font-family: var(--font-family);
    font-size: 1.1rem;
  }

  /*  MEDIA QUERY */
  @media (max-width:450px) {
    .btn {
      margin-top: 5%;
    }
  }
</style>

<!-- TABLE -->
<div class="container my-4">
  <h2 class="mb-4">Payments info</h2>

  <!-- Search Record -->
  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="mb-3 inner-container">
      <label for="search" class="form-label" name="search">Search for records</label>
      <input type="text" name="search" class="form-control width" id="search" placeholder="Search by person name"><br>
      <button type="submit" name="searchbtn" class="btn btn-dark"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Payment</th>
        <th scope="col">Date</th>
        <th scope="col">Operation</th>
      </tr>

  <?php
  // Search Record
  $search = $_POST['search'];
  if(isset($search)){
    $sql = "SELECT * FROM `paymenttb` WHERE `name` = '$search'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows > 0){
      while($row = mysqli_fetch_assoc($result)){
        $sno = $row['s_no'];
        $name = $row['name'];
        $payment = $row['payment'];
        $date = $row['date'];
        echo "<tr>
          <td>$name</td>
          <td>$payment</td>
          <td>$date</td>
          <td><a href='update.php?sno=$sno' class='btn btn-sm btn-dark'><i class='fa-solid fa-pen-to-square'></i></a>&nbsp;&nbsp;&nbsp;<a class='btn btn-sm btn-dark' onclick='delete_confirm($sno)'><i class='fa-solid fa-trash'></i></a></td>
      </tr>";
      }
    }else{
      $no_rows = "No Record Found";
    }
  }
  else{
  $sql = "SELECT * FROM `paymenttb`";
  $result = mysqli_query($conn, $sql);
  $num_rows = mysqli_num_rows($result);
  if($num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
      $sno = $row['s_no'];
      $name = $row['name'];
      $payment = $row['payment'];
      $date = $row['date'];
      echo "<tr>
        <td>$name</td>
        <td>$payment</td>
        <td>$date</td>
        <td><a href='update.php?sno=$sno' class='btn btn-sm btn-dark'><i class='fa-solid fa-pen-to-square'></i></a>&nbsp;&nbsp;&nbsp;<a class='btn btn-sm btn-dark' onclick='delete_confirm($sno)'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
    }
  }else{
    $no_rows = "No Record Found";
  }
}
?>
    </thead>
    <tbody>
    </tbody>
  </table>
  <h2 class='text-center my-4 text-light bg-dark'>
    <?php echo $no_rows; ?>
  </h2>
</div>


<!-- JAVASCRIPT CODE -->
<script>
  function delete_confirm(sno) {
    c = confirm('Are you sure to delete this record?');
    if (c) {
      window.location.href = "delete.php?sno=" + sno;
    }
  }

</script>