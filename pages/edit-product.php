<?php include('../views/header.php'); ?>

<?php include('../views/navbar.php'); ?>

<?php
if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
    $query = "SELECT * FROM `products` WHERE `product_id` = $id";
    $result = $conn->query($query);

    if ($result->num_rows < 1) {
        header('Location: ../');
    }
} else {
    header('Location: ../');
}
?>

<?php if (isset($_POST['inputUpdate'])) {
    $id = $_GET['product_id'];
    $name = $_POST['inputProductName'];
    $description = $_POST['inputProductDescription'];
    $price = $_POST['inputProductPrice'];
    $image = $_FILES['inputProductImage']['name'];
    $query = "UPDATE `products` SET `product_name` = '$name', `product_description` = '$description', `product_price` = '$price', `product_image` = '$image' WHERE `products`.`product_id` = $id";
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
}
?>

<div class="container">
    <?php while ($row = $result->fetch_assoc()) {
        ?>
        <div class="row">
            <div class="d-flex flex-column align-items-center col col-2">
                <div class="ratio ratio ratio-1x1">
                    <img id="productImagePreview" src="../public/products/<?= $row['product_image'] ?>"
                        class="rounded-circle object-fit-cover">
                </div>
                <small class="mt-3">Preview Product Image</small>
            </div>
            <div class="col col-10">
                <form enctype="multipart/form-data" action="" method="post">
                    <div class="container">
                        <h5 class="mb-3">Edit Product</h5>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputProductName" class="small form-label">Nama Produk</label>
                                <input name="inputProductName" type="text" class="form-control form-control-sm"
                                    id="inputProductName" value="<?= $row['product_name'] ?>">
                            </div>
                            <div class="col">
                                <label for="inputProductDescription" class="small form-label">Deskripsi Produk</label>
                                <input name="inputProductDescription" type="text" class="form-control form-control-sm"
                                    id="inputProductDescription" value="<?= $row['product_description'] ?>">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="inputProductPrice" class="small form-label">Harga Produk</label>
                                <input required name="inputProductPrice" type="number" min="0"
                                    class="form-control form-control-sm" id="inputProductPrice"
                                    value="<?= $row['product_price'] ?>">
                            </div>
                            <div class="col">
                                <label for="inputProductImage" class="small form-label">Foto Produk</label>
                                <input required name="inputProductImage" class="form-control form-control-sm" type="file"
                                    accept="image/*" id="inputProductImage" value="<?= $row['product_image'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-secondary btn-sm w-100" href="../">Back</a>
                            </div>
                            <div class="col">
                                <input name="inputUpdate" type="submit" class="btn btn-primary btn-sm w-100" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<script type="text/javascript">
    inputProductImage.onchange = evt => {
        const [file] = inputProductImage.files
        if (file) {
            productImagePreview.src = URL.createObjectURL(file)
        }
    }
</script>

<?php include('../views/footer.php'); ?>