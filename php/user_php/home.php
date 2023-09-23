<style>
.reg_div { margin-left: 15px; margin-right: 15px; margin-top: 5px; margin-bottom: 5px; float: left; border: 0.5px solid black; background-color: #ffffff87; border-radius: 12px; padding: 20px; width: min-content; height: auto; }
.reg_div:hover { margin-left: 15px; margin-right: 15px; margin-top: 5px; margin-bottom: 5px; border: 0.5px solid black; float: left; background-color: #d9d9d989; border-radius: 12px; padding: 20px; width: min-content; height: auto; }
.img_style { width: 180px; height: 180px; object-fit: contain;}
.img_rate { width: 25px; height: 25px; border-radius: 12px; margin-right: 5px; margin-top: 5px;}
label { font-family: Verdana, sans-serif; font-size: 18px; margin: 2.5px;}

button { margin-top: 5px; width: 120px; height: 30px; border: 0; border-radius: 10px; color: azure; background-color: #0040ff8c;}
button:hover { margin-top: 5px; width: 120px; height: 30px; border: 0; border-radius: 10px; color: azure; background-color: #ffa6008c;}
</style>

<body>
<label style="font-family: monospace; font-size: 15px; color: black; padding: 15px;">Available Cars for Rent</label>
<br><br>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'horizon_rental_car');

$sql = "SELECT * FROM products";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
 echo '<div class="reg_div">';
 echo '<img class="img_style" src="' . $row['product_icon'] . '"/><br>';
 echo '<label><b>' . $row['product_name'] . '</b></label><br>';
 echo '<img class="img_rate" src="../../images/icon/star.png"/><label>' . $row['product_rate'] . ' (Ratings)</label><br>';
 echo '<label> &#8377;' . $row['product_price'] . ' per/day</label><br>';
 echo '<button onclick="msg()">Add to Cart</button>';
 echo '</div>';
} 
?>

<script>
function msg(){
 alert("Your Selected Car will Approve soon");
} 
</script>
</body>








