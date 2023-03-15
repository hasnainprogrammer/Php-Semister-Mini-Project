<?php
// CREATE A CONNECTION
$servername = "localhost";
$username = "root";
$password = "";
$database = "quarterdb";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn) {
    echo "Connection Failed due to ".mysqli_connect_error();
}
// else {
//     echo "Connection Successfull";
// }
?>