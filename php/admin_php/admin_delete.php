<?php
$con = mysqli_connect('localhost', 'root', '', 'horizon_rental_car');

$id = $_GET['id'];

$query = "DELETE FROM boss_admin WHERE admin_id = $id;";

//$stmt = $con->query($query);
if(mysqli_query($con, $query)) {
 echo "<script>window.open('../admin_index.html', '_blank');</script>";
} else {
 echo 'Error Plech check the command...';
}
?>