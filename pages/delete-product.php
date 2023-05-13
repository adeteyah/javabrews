<?php include('conn.php');
if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];

    $queryGetImage = "SELECT product_image FROM products WHERE `products`.`product_id` = $id";
    $result = mysqli_query($conn, $queryGetImage);
    $row = mysqli_fetch_assoc($result);

    $queryDelete = "DELETE FROM products WHERE `products`.`product_id` = $id";
    if (mysqli_query($conn, $queryDelete)) {
        unlink('../public/products/' . $row['product_image']);
        header('Location: ../');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header('Location: ../');
}