<?php
//DATABASE NAME
$conn = mysqli_connect('localhost', 'root', '', 'horizon_rental_car');

$l_alert_msg_txt = "";

//on Submit Button Click
if(isset($_POST['login_submit'])){ 
  $signup_email = $_POST['signup_email'];
  $signup_password = $_POST['signup_password'];

$sqli = " SELECT * FROM horizon_signup WHERE signup_email='$signup_email' AND signup_password='$signup_password' ";

$querya = mysqli_query($conn, $sqli);

//$row = mysqli_num_rows($query);

if(mysqli_num_rows($querya) > 0){
 session_start(); 
 //echo "Login Succesful";
 $_SESSION['signup_email'] = $signup_email;
 $_SESSION['signup_password'] = $signup_password;

 echo "<script>window.open('user_index.html', '_blank');</script>";
}else{
 //echo "<script type="javascript">alert("Error: user id , password is not valid \nPlease Try Again")</script>";
 $l_alert_msg_txt = "Password is Incorrect";
}

if(isset($_POST['login_reset'])){
  $l_alert_msg_txt = "";
}
}
?>

<?php
//DATABASE NAME
$con = mysqli_connect('localhost', 'root', '', 'horizon_rental_car');

$s_alert_msg_txt = "";

if (isset($_POST['signup_submit'])){
  $signup_name = $_POST['signup_name'];
  $signup_email = $_POST['signup_email'];
  $signup_birthdate = $_POST['signup_birthdate'];
  $signup_mobile = $_POST['signup_mobile'];
  $signup_password = $_POST['signup_password'];
  $signup_c_password = $_POST['signup_c_password'];

//INSERTION / TABLE NAME
$sql = "INSERT INTO horizon_signup (signup_name, signup_email, signup_birthdate, signup_mobile, signup_password)
VALUES ('$signup_name', '$signup_email', '$signup_birthdate', '$signup_mobile', '$signup_password')";

//EXECUTION
$result = mysqli_query($con, $sql);  

if ($result){
//echo "done";
//header('location: user_index.html');
//Empty Msg
if($signup_name == "" || $signup_email == "" || $signup_birthdate == "" || $signup_mobile === "" || $signup_password == "" || $signup_c_password == ""){
  $s_alert_msg_txt = "Please Fill all Details";
} else {
  echo "<script>window.open('user_index.html', '_blank');</script>";
}

//Password is Incorrect
if($signup_password != $signup_c_password){
  $s_alert_msg_txt = "Password Does not Match";
}else {
  echo "<script>window.open('user_index.html', '_blank');</script>";
}

}
else{
die(mysqli_error($con));
$s_alert_msg_txt = "Password is Incorrect";
}

if(isset($_POST['signup_reset'])){
  $s_alert_msg_txt = "";
}
}
?>
<link rel="stylesheet" href="../style/registration_login.css">
<body>
<div class="main_div">
<center>
<img class="icon_main_logo" src="../images/logo/horizon_cars_logo_500x500.png"/>
<br>
<lable class="title">Horizon Rental Car</lable>

<!--Login and Registration-->
<table style="margin: 5px;">
<tr>
 <td><button id="l_reg_but" class="l_reg_but_r">LogIn</button></td>
 <td><button id="s_reg_but" class="s_reg_but_r">SignUp</button></td>
</tr> 
</table>

<!--LogIn FORM-->
<div id="login_table">
<form method="POST">
<table>
<tr>
 <td><img src="../images/icon/user_icon_200x200.png" alt="user_icon"/></td>
 <td><input name="signup_email" id="login_email" type="text" placeholder="User id / Email.com" maxlength="50" alt="user_textbox"/></td> 
</tr>
<tr>
 <td><img src="../images/icon/psdk_icon_200x200.png" alt="psdk_icon"/></td>
 <td><input name="signup_password" id="login_pskd" type="password" placeholder="Password" maxlength="20" alt="psdk_textbox"/></td>
</tr>
</table>
<!--SignUp Reset & Submit-->
<table style="margin: 5px;">
<tr>
 <td><button name="login_reset" type="reset" class="r_but">Reset</button></td>
 <td><button name="login_submit" type="submit" class="s_but">Submit</button></td> 
</tr> 
</table>
</form> 
<span id="login_alert_msg" name="login_alert_msg" class="alert_text_css"><?php echo $l_alert_msg_txt; ?></span>
</div>

<!--SignUp FORM-->
<div id="signup_table" onsubmit="return SignupForm()">
<form method="POST">
<table>
<tr>
<td><img src="../images/icon/user_icon_200x200.png"/></td>
<td><input name="signup_name"  id="signup_name" placeholder="Your Full Name" maxlength="40" type="text"/></td> 
</tr>
<tr>
<td><img src="../images/icon/gmail_icon_200x200.png"/></td>
<td><input name="signup_email" id="signup_email" placeholder="Email" maxlength="50" type="text"/></td> 
</tr>
<tr>
<td><img src="../images/icon/cake_icon_200x200.png"/></td>
<td><input name="signup_birthdate" id="signup_birthdate" placeholder="Birthdate" type="date"/></td> 
</tr>
<tr>
<td><img src="../images/icon/phone_icon_200x200.png"/></td>
<td><input name="signup_mobile" id="signup_mobile" placeholder="+91 Phone No" maxlength="12" onkeypress="if(this.value.length==12) return false;" type="number"/></td> 
</tr>
<tr>
<td><img src="../images/icon/psdk_icon_200x200.png"/></td>
<td><input name="signup_password" id="signup_psdk" placeholder="Password" maxlength="20" type="password"/></td> 
</tr>      
<tr>
<td><img src="../images/icon/psdk_icon_200x200.png"/></td>
<td><input name="signup_c_password" id="signup_c_psdk" placeholder="Confirm Password" maxlength="20" type="password"/></td> 
</tr>
</table>
<!--SignUp Reset & Submit-->
<table style="margin: 5px;">
<tr>
<td><button type="reset" class="r_but">Reset</button></td>
<td><button name="signup_submit" type="submit" class="s_but">Submit</button></td> 
</tr> 
</table>
</form>
<span id="signup_alert_msg" name="s_alert_msg" class="alert_text_css"><?php echo $s_alert_msg_txt; ?></span>
</div>

</center>
</div>
<script>
//LogIn Empty Msg  
function LoginForm() {
var name = document.getElementById("login_email").value;
var psdk = document.getElementById("login_psdk").value;

if(name == "" || psdk == ""){
  document.getElementById("login_alert_msg").innerHTML = 'Please Fill all Details';
  return false;
}
return true;
}    

//SignUp Empty Msg
function LoginForm() {
var name = document.getElementById("signup_name").value;
var email = document.getElementById("signup_email").value;
var bday = document.getElementById("signup_birthdate").value;
var mobile = document.getElementById("signup_mobile").value;
var psdk = document.getElementById("signup_psdk").value;
var c_psdk = document.getElementById("signup_c_psdk").value;

if(name == "" || email == "" || bday == "" || mobile === "" || psdk == "" || c_psdk == ""){
  document.getElementById("signup_alert_msg").innerHTML = 'Please Fill all Details';
  return false;
}

if(psdk != c_pskd) {
  document.getElementById("signup_alert_msg").innerHTML = 'Password Does not Match';
  return false;
}
return true;
}

</script>  


<!--JAVASCRIPT-->
<script type="text/javascript" src="../jQuery.js"></script>
<script>
$(document).ready(function() {
//DIV Hidden Table
$("#login_table").show();
$("#signup_table").hide();
$("#l_reg_but").addClass("l_reg_but_f");

 //Login Button
 $("#l_reg_but").click(function(){
  //REMOVE Class
  $("#s_reg_but").removeClass("s_reg_but_f");
  $("#l_reg_but").removeClass("l_reg_but_r");
  //ADD Class
  $("#l_reg_but").addClass("l_reg_but_f");
  $("#s_reg_but").addClass("s_reg_but_r");
  //DIV Hide / UnHide
  $("#login_table").show();
  $("#signup_table").hide();
 });

 //Signin Button
 $("#s_reg_but").click(function(){
  //REMOVE Class
  $("#l_reg_but").removeClass("l_reg_but_f");
  $("#s_reg_but").removeClass("s_reg_but_r");
  //ADD Class
  $("#s_reg_but").addClass("s_reg_but_f");
  $("#l_reg_but").addClass("l_reg_but_r");
  //DIV Hide / UnHide
  $("#login_table").hide();
  $("#signup_table").show();
 });
});
</script>
</body>
