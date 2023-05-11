<?php include('conn.php');
if (isset($_POST['inputAdd'])) {
    $name = $_POST['inputProductName'];
    $description = $_POST['inputProductDescription'];
    $price = $_POST['inputProductPrice'];
    $image = $_FILES['inputProductImage']['name'];
    $query = "INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_image`) VALUES (NULL, '$name', '$description', '$price', '$image')";
    if (mysqli_query($conn, $query)) {
        $uploaded_file = $_FILES['inputProductImage']['tmp_name'];
        $destination_path = '../public/products/' . $_FILES['inputProductImage']['name'];
        if (move_uploaded_file($uploaded_file, $destination_path)) {
            header('Location: ../index.php');
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} ?>