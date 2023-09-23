<?php
$conn = mysqli_connect('localhost', 'root', '', 'horizon_rental_car');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['product_id'])) {
 $id = $_POST['product_id'];
 $new_name = $_POST['product_name'];
 $new_rate = $_POST['product_rate'];
 $new_price = $_POST['product_price'];

 // Handle the file upload
 if (isset($_FILES['product_icon']) && $_FILES['product_icon']['error'] === UPLOAD_ERR_OK) {
     $target_dir = "../../images/cars_on_rent/"; // Directory where uploaded files will be saved
     $target_file = $target_dir . basename($_FILES['product_icon']['name']);
     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

     // Check if the uploaded file is a valid image (PNG or JPG)
     if ($imageFileType == "png" || $imageFileType == "jpg" || $imageFileType == "jpeg") {
         if (move_uploaded_file($_FILES['product_icon']['tmp_name'], $target_file)) {
             // Update the record in the database with the new file path
             $new_icon = $target_file;
             $sql = "UPDATE products SET 
                     product_name='$new_name', 
                     product_icon='$new_icon',
                     product_rate='$new_rate',
                     product_price='$new_price' 
                     WHERE product_id='$id'";

             if ($conn->query($sql) === TRUE) {
                 echo "<script>window.open('../admin_index.html', '_blank');</script>";
             } else {
                 echo "Error updating record: " . $conn->error;
             }
         } else {
             echo "Error uploading file.";
         }
     } else {
         echo "Invalid file format. Only PNG and JPG files are allowed.";
     }
 } else {
     echo "No file uploaded.";
 }
}
?>
