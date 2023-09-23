<style>
body { padding: 20px; }    
.top_title { padding: 5px; font-family: monospace; font-size: 28px; margin-bottom: 20px; }

.list_names { font-family: Verdana, sans-serif; font-size: 18px; color: black; }
.input_style { margin: 2.5px; padding-left: 10px; width: 220px; height: 30px; border-radius: 0px 12px 12px 0px; border: 0;  color: azure; background-color: #00000062;}
.input_style::placeholder { margin: 2.5px; padding-left: 10px; width: 220px; height: 30px; border-radius: 0px 12px 12px 0px; border: 0;  color: azure; background-color: #00000062;}
.input_image { width: 300px; height: 30px; color: black;}

.but { margin-left: 5px; background-color: #1953ffa3; width: 100px; height: 30px; margin-top: 10px; border: 0; border-radius: 5px;  }
</style>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'horizon_rental_car');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record by ID
    $sql = "SELECT * FROM products WHERE product_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Display the edit form
        echo "<form method='POST' action='edit_action.php' enctype='multipart/form-data'>";
        echo '<table><tr><td><td>';
        echo "<input class='input_style' type='hidden' name='product_id' value='" . $row["product_id"] . "'></td><tr>";
        echo "<tr><td><label class='list_names'>Car Name:</label></td>";
        echo "<td><input class='input_style' type='text' name='product_name' value='" . $row["product_name"] . "'></td><tr>";
        echo "<tr><td><label class='list_names'>Car Icon (Image):</label></td>";
        echo "<td><input type='file' name='product_icon' value='" . $row["product_icon"] . "'></td></tr>";
        echo "<tr><td><label class='list_names'>Car Rate:</label></td>";
        echo "<td><input class='input_style' type='text' name='product_rate' value='" . $row["product_rate"] . "'></td></tr>";
        echo "<tr><td><label class='list_names'>Car Price:</label></td>";
        echo "<td><input class='input_style' type='text' name='product_price' value='" . $row["product_price"] . "'></tr></td>";
        echo "<tr><td><button type='reset' class='but'>Reset</button></td>";
        echo "<td><button type='submit' value='Update' class='but'>Submit</button>";
        echo '</td></tr></table>';
        echo "</form>";
    } else {
        echo "Record not found.";
    }
}
?>