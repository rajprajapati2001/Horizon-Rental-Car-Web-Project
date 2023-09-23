<link rel="stylesheet" href="../../style/index_style.css">
<style>
.new { width: 130px; height: auto; padding: 10px; margin-right: 5px; border-radius: 12px; border: 0; background-color: dodgerblue; }
.new_select { width: 130px; height: auto; padding: 10px; font-weight: 600; margin-right: 5px; border-radius: 12px; border: 0; background-color: #1feb00; }
.new:hover { width: 130px; height: auto; padding: 10px; font-weight: 600; margin-right: 5px; border-radius: 12px; border: 0; background-color: #ebe700; }

.bg_sheet { padding: 0px; width: auto; height: 35vw; margin-left: 20px; margin-right: 20px; border-radius: 12px; background-color: #00ffff59; background-image: url('../../images/x_background_64x64.png'); }

.new_admin_logo { width: 200px; height: 200px; margin-top: 10px; }
.reg_name { font-family: monospace; font-size: 22px; }
.reg_input { width: 220px; height: 40px; border-radius: 0px 30px 30px 0px; border: 0px; color: black; margin: 5px; padding-left: 10px; }

.reg_but { background-color: #001aff9c; color: white; margin-top: 10px; margin-left: 5px; margin-right: 5px; width: 150px; height: 35px; border-radius: 12px; border: 0; }

.details_table { width: auto; height: auto; padding-top: 20px; }
.details_table th { font-family: monospace; font-size: 25px; background-color: #0000ff40; border-radius: 20px;  padding-left: 25px; padding-right: 25px; padding-top: 5px; padding-bottom: 5px;}
.details_table td { font-size: 18px; font-family: Verdana, sans-serif; text-align: center; background-color: #ff880040; border-radius: 12px; padding-left: 20px; padding-right: 20px; padding-top: 2.5px; padding-bottom: 2.5px;}
.details_but { width: 100px; height: 30px; border-radius: 12px; border: 0; background-color: red; color: white; padding-left: 5px; padding-right: 5px; }
</style>
<body>

<table style="margin-top: 20px; margin-left: 30px;">
<tr>
<td><button id="new_admin_but" class="new_select">New Admin</button></td>
<td><button id="details_but" class="new">Admin Details</button></td> 
<td><button class="new" onclick="window.location.reload();">Refresh</button></td> 
</tr> 
</table><br>


<?php
$con = mysqli_connect('localhost', 'root', '', 'horizon_rental_car');

if (isset($_POST['admin_submit'])){
  $admin_email = $_POST['admin_email'];
  $admin_password = $_POST['admin_password'];

$sql = "INSERT INTO boss_admin (admin_email, admin_password)
VALUES ('$admin_email', '$admin_password')";

$result = mysqli_query($con, $sql);  

if ($result){
  if($admin_email == "" || $admin_password == ""){
    //$s_alert_msg_txt = "Please Fill all Details";
  } else {
    echo "<script>window.open('../admin_index.html', '_blank');</script>";
  }
}else{
  die(mysqli_error($con));
  //$s_alert_msg_txt = "Password is Incorrect";
}

}
?>


<div id="new-admin_layout" class="bg_sheet">
<center>
 <img class="new_admin_logo" src="../../images/icon/new_admin_logo.png" /> 
 <div>
  <form method="POST">
<table>
 <tr>
  <td><label class="reg_name">Admin ID :</label></td>
  <td><input name="admin_email" class="reg_input" placeholder="Enter Admin ID" type="text"/></td> 
 </tr>
 <tr>
  <td><label class="reg_name">Password :</label></td>
  <td><input name="admin_password" class="reg_input" placeholder="Password" type="password"/></td> 
 </tr>
 <tr>
  <td colspan="2">
    <center>
    <button type="reset" class="reg_but">Reset</button>
    <button type="submit" name="admin_submit" class="reg_but">Submit</button>
    </center>
  </td> 
 </tr> 
</table>
</form>  
</div>

</center>
</div>



<div id="display-admin_layout" class="bg_sheet">
<center>

<!--Display and Delete the Records-->

<?php
$con = mysqli_connect('localhost', 'root', '', 'horizon_rental_car');

$query = "SELECT * FROM boss_admin;";
$stmt = $con->query($query);

echo '<table class="details_table">';
echo '<thead>';
echo '<tr><th>ID</th><th>Email</th><th>Password</th><th>Delete</th>';
echo '</thead>';
echo '<tbody>';


while ($row = $stmt->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['admin_id'] . '</td>';
  echo '<td>' . $row['admin_email'] . '</td>';
  echo '<td>' . $row['admin_password'] . '</td>';
  echo '<td><button onclick="window.location.href=\'admin_delete.php?id=' . $row['admin_id'] . '\'" class="details_but">Delete</button></td>';
  //echo '<td><a href="admin_delete.php?id=' . $row['admin_id'] . '">Delete</a></td>';
  echo '</tr>';
}

echo '</tbody>';
echo '</table>';

?>

</center>
</div>


</body>
<script src="../../jQuery.js"></script>
<script>
$(document).ready(function(){
 $("#new-admin_layout").show();
 $("#display-admin_layout").hide();

 $("#new_admin_but").click(function(){
  $("#new-admin_layout").show();
  $("#display-admin_layout").hide();

  $("#new_admin_but").removeClass("new");
  $("#new_admin_but").addClass("new_select");
  $("#details_but").removeClass("new_select");
  $("#details_but").addClass("new");
 });

 $("#details_but").click(function(){
  $("#new-admin_layout").hide();
  $("#display-admin_layout").show();

  $("#new_admin_but").removeClass("new_select");
  $("#new_admin_but").addClass("new");
  $("#details_but").removeClass("new");
  $("#details_but").addClass("new_select");
 });
});  
</script>