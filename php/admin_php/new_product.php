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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_rate = $_POST["product_rate"];
    $product_price = $_POST["product_price"];

    // File upload handling
    $upload_directory = "../../images/cars_on_rent/";
    $target_file = $upload_directory . basename($_FILES["product_icon"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["product_icon"]["tmp_name"]);
    if ($check !== false) {
        // Check file size (adjust the size as needed)
        if ($_FILES["product_icon"]["size"] > 1024000) {
            echo "Sorry, your file is too large.";
        } else {
            // Allow certain file formats (you can customize this list)
            if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
                if (move_uploaded_file($_FILES["product_icon"]["tmp_name"], $target_file)) {
                    // File upload success, insert into the database
                    //$insert_sql = "INSERT INTO products (product_id, product_icon, product_name) VALUES ('$product_id', '$target_file', '$product_name')";
                    $insert_sql = "INSERT INTO products ( product_icon, product_name, product_rate, product_price) VALUES ('$target_file', '$product_name' , '$product_rate' , '$product_price')";
                    
                    
                    if ($conn->query($insert_sql) === TRUE) {
                        echo "<script>window.open('../admin_index.html', '_blank');</script>";
                    } else {
                        echo "Error inserting record: " . $conn->error;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
            }
        }
    } else {
        echo "File is not an image.";
    }
}
?>

<body>
    <label class="top_title">Enter Car's Records</label>
<div style="padding-top: 30px; padding-left: 5px;">
    <form method="post" enctype="multipart/form-data">
<table>
 <tr>
  <td><label class="list_names">Car Icon (Image):</label></td>
  <td><input class="input_image" type="file" name="product_icon"></td>   
 </tr>
 <tr>
  <td><label class="list_names">Car Name:</label></td>  
  <td><input class="input_style" placeholder="Car Name" type="text" name="product_name"></td> 
 </tr>
 <tr>
  <td><label class="list_names">Car Rate:</label></td>  
  <td><input class="input_style" type="text" placeholder="Car Ratings" name="product_rate"></td> 
 </tr>
 <tr>
  <td><label class="list_names">Car Price:</label></td>  
  <td><input class="input_style" type="text" placeholder="car Price" name="product_price"></td> 
 </tr>
 <tr>
  <td colspan="2">
   <button class="but" type="reset">Reset</button>   
   <button class="but" name="submit_product" type="submit">Submit</button>   
  </td>   
 </tr>   
</table>        
    </form>
</div>
</body>
