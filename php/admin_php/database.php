<style>
body { padding: 20px; }    
.top_title { padding: 5px; font-family: monospace; font-size: 28px; padding-left: 50px; margin-bottom: 20px; }

.list_names { font-family: Verdana, sans-serif; font-size: 18px; color: black; }
.input_style { margin: 2.5px; padding-left: 10px; width: 220px; height: 30px; border-radius: 0px 12px 12px 0px; border: 0;  color: azure; background-color: #00000062;}
.input_image { width: 300px; height: 30px; color: black;}

.but { margin-left: 5px; background-color: #1953ffa3; width: 100px; height: 30px; margin-top: 10px; border: 0; border-radius: 5px;  }

.details_table { width: auto; height: auto; padding-top: 20px; margin-top: 10px; }
.details_table th { font-family: monospace; font-size: 25px; background-color: #0000ff40; border-radius: 20px;  padding-left: 25px; padding-right: 25px; padding-top: 5px; padding-bottom: 5px;}
.details_table td { font-size: 18px; font-family: Verdana, sans-serif; text-align: center; background-color: #ff880040; border-radius: 12px; padding-left: 20px; padding-right: 20px; padding-top: 2.5px; padding-bottom: 2.5px;}
.details_but { width: 100px; height: 30px; border-radius: 12px; border: 0; background-color: red; color: white; padding-left: 5px; padding-right: 5px; }

</style>
<body>
<lable class="top_title">Database</lable>

<center>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'horizon_rental_car');

if(isset($_GET['delete_id'])) {
 $delete_id = $_GET['delete_id'];
 $delete_sql = "DELETE FROM products WHERE product_id = $delete_id";

 if(mysqli_query($conn, $delete_sql)){
    echo "<script>window.open('../admin_index.html', '_blank');</script>";
 }else {
     echo "Error Deleting Records".$conn->error;
 }
}


$sql = "SELECT * FROM products";
$result = $conn->query($sql);

echo '<table class="details_table">';
echo '<thead>';
echo '<tr><th>ID</th><th>Product Icon</th><th>Product Name</th><th>Product Rate</th><th>Product Price</th><th>Delete</th><th>Edit</th>';
echo '</thead>';
echo '<tbody>';


while ($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['product_id'] . '</td>';
  echo '<td>📷</td>';
  echo '<td>' . $row['product_name'] . '</td>';
  echo '<td>' . $row['product_rate'] . '</td>';
  echo '<td>' . $row['product_price'] . '</td>';
  echo '<td><button onclick="window.location.href=\'database.php?delete_id=' . $row['product_id'] . '\'" class="details_but">Delete</button></td>';
  echo '<td><button onclick="window.location.href=\'edit.php?id=' . $row['product_id'] . '\'" class="details_but">Edit</button></td>';
  //echo '<td><a href="admin_delete.php?id=' . $row['admin_id'] . '">Delete</a></td>';
  echo '</tr>';
}

echo '</tbody>';
echo '</table>';

?>
</center>

</body>