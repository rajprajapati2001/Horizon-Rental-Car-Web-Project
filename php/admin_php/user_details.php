<style>
.top_title { padding: 30px; font-family: monospace; font-size: 28px; margin-bottom: 20px; }

.bg_sheet { padding: 0px; width: auto; height: 35vw; margin-left: 20px; margin-right: 20px; border-radius: 12px; background-color: #00ffff59; background-image: url('../../images/x_background_64x64.png'); }

.details_table { width: auto; height: auto; padding-top: 20px; margin-top: 10px; }
.details_table th { font-family: monospace; font-size: 25px; background-color: #0000ff40; border-radius: 20px;  padding-left: 25px; padding-right: 25px; padding-top: 5px; padding-bottom: 5px;}
.details_table td { font-size: 18px; font-family: Verdana, sans-serif; text-align: center; background-color: #ff880040; border-radius: 12px; padding-left: 20px; padding-right: 20px; padding-top: 2.5px; padding-bottom: 2.5px;}
.details_but { width: 100px; height: 30px; border-radius: 12px; border: 0; background-color: red; color: white; padding-left: 5px; padding-right: 5px; }
</style>
<body>
<lable class="top_title">Users Details</lable>

<div id="new-admin_layout" class="bg_sheet">
<center>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'horizon_rental_car');

if(isset($_GET['delete_id'])) {
 $delete_id = $_GET['delete_id'];
 $delete_sql = "DELETE FROM horizon_signup WHERE signup_id = $delete_id";

 if(mysqli_query($conn, $delete_sql)){
    echo "<script>window.open('../admin_index.html', '_blank');</script>";
 }else {
     echo "Error Deleting Records".$conn->error;
 }
}


$sql = "SELECT * FROM horizon_signup";
$result = $conn->query($sql);

echo '<table class="details_table">';
echo '<thead>';
echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Birthdate</th><th>Mobile</th><th>Password</th><th>Delete</th>';
echo '</thead>';
echo '<tbody>';


while ($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['signup_id'] . '</td>';
  echo '<td>' . $row['signup_name'] . '</td>';
  echo '<td>' . $row['signup_email'] . '</td>';
  echo '<td>' . $row['signup_birthdate'] . '</td>';
  echo '<td>' . $row['signup_mobile'] . '</td>';
  echo '<td>' . $row['signup_password'] . '</td>';
  echo '<td><button onclick="window.location.href=\'user_details.php?delete_id=' . $row['signup_id'] . '\'" class="details_but">Delete</button></td>';
  //echo '<td><a href="admin_delete.php?id=' . $row['admin_id'] . '">Delete</a></td>';
  echo '</tr>';
}

echo '</tbody>';
echo '</table>';

?>
</center>
</div>

</body>


