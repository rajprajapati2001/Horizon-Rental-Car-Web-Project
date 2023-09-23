<?php
//DATABASE NAME
$con = mysqli_connect('localhost', 'root', '', 'horizon_rental_car');

$alert_msg_txt = "";
//on Submit Button Click
if(isset($_POST['admin_submit'])){ 
  $admin_email = $_POST['admin_email'];
  $admin_password = $_POST['admin_password'];

$sql = " SELECT * FROM boss_admin WHERE admin_email='$admin_email' AND admin_password='$admin_password' ";

$query = mysqli_query($con, $sql);

//$row = mysqli_num_rows($query);

if(mysqli_num_rows($query) > 0){
 session_start(); 
 //echo "Admin Login Succesful";
 $_SESSION['admin_email'] = $admin_email;
 $_SESSION['admin_password'] = $admin_password;

 echo "<script>window.open('admin_index.html', '_blank');</script>";
}else{
 //echo "Admin Login Faild";
 //$alert_txt = "<span id=\"alert_msg\" name=\"alert_msg\" class=\"alert_text_css\">Invalid Password</span>";
 $alert_msg_txt = "Password is Incorrect";
}

//Reset Button Click
if(isset($_POST['admin_reset'])){
  $alert_msg_txt = "";
}
}
?>

<link rel="stylesheet" href="../style/admin_login.css">
<body>
<div class="admin_main_div">
<center>
<img class="icon_main_logo" src="../images/icon/admin_software_engineer.png"/>
 <br>
<lable class="admin_title">Admin Login</lable>

<div>
<form method="POST" onsubmit="return validateForm()"> 
<table style="margin-top: 5px;">
<tr>
 <td><img src="../images/icon/user_icon_200x200.png" alt="user_icon"/></td>
 <td><input name="admin_email" id="admin_name" type="text" placeholder="Admin User id" maxlength="50" alt="user_textbox"/></td> 
</tr>
<tr>
 <td><img src="../images/icon/psdk_icon_200x200.png" alt="psdk_icon"/></td>
 <td><input name="admin_password" id="admin_psdk" type="password" placeholder="Admin Password" maxlength="20" alt="psdk_textbox"/></td>
</tr>
</table>
<!--SignUp Reset & Submit-->
<table style="margin: 5px;">
<tr>
 <td><button name="admin_reset" type="reset" class="r_but">Reset</button></td>
 <td><button name="admin_submit" type="submit" class="s_but">Submit</button></td> 
</tr> 
</table> 
</form>

<span id="alert_msg" name="alert_msg" class="alert_text_css"><?php echo $alert_msg_txt; ?></span>
</div>
</center>
</div>
<script type="text/javascript">
function validateForm() {
  var name = document.getElementById("admin_name").value;
  var psdk = document.getElementById("admin_psdk").value;

  if(name == "" || psdk == ""){
    document.getElementById("alert_msg").innerHTML = 'Please Fill all Details';
    return false;
  }
  return true;
}  
</script>  
</body>