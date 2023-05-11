<?php include('views/header.php'); ?>

<?php include('views/navbar.php'); ?>

<?php
$query = "SELECT * FROM `products`";
$result = $conn->query($query);
?>

<div class="container">
    <div class="row">
        <div class="d-flex align-items-center col col-2">
            <div class="ratio ratio ratio-1x1">
                <img id="productImagePreview" src="public/images/imagePlacholder.png"
                    class="rounded-circle object-fit-cover" alt="Pendiri" title="Pendiri Javabrews">
            </div>
        </div>
        <div class="col col-10">
            <form enctype="multipart/form-data" action="pages/add-product.php" method="post">
                <div class="container">
                    <h5 class="mb-3">Add Product</h5>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputProductName" class="small form-label">Nama Produk</label>
                            <input name="inputProductName" type="text" class="form-control" id="inputProductName">
                        </div>
                        <div class="col">
                            <label for="inputProductDescription" class="small form-label">Deskripsi Produk</label>
                            <input name="inputProductDescription" type="text" class="form-control"
                                id="inputProductDescription">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="inputProductPrice" class="small form-label">Harga Produk</label>
                            <input required name="inputProductPrice" type="number" min="0" class="form-control"
                                id="inputProductPrice">
                        </div>
                        <div class="col">
                            <label for="inputProductImage" class="small form-label">Foto Produk</label>
                            <input required name="inputProductImage" class="form-control" type="file" accept="image/*"
                                id="inputProductImage">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="reset" class="btn btn-primary w-100">
                        </div>
                        <div class="col">
                            <input name="inputAdd" type="submit" class="btn btn-primary w-100">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr class="my-5 " noshade>
    <div class="row row-cols-4 gy-5">
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="col">
                    <div class="card">
                        <div class="card text-bg-dark ratio ratio-1x1">
                            <img src="public/products/<?= $row["product_image"] ?>"
                                class="card-img card-img-product  object-fit-cover" alt="<?= $row["product_image"] ?>"
                                title="<?= $row["product_name"] ?>">
                            <div class="card-img-overlay d-flex flex-wrap flex-row align-content-end">
                                <p class="w-100 h5 fw-bold product-description">
                                    <?= $row["product_name"] ?>
                                </p>
                                <p class="w-100 product-description">
                                    <?= $row["product_description"] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-light product-price my-3">
                        <?= "Rp. " . number_format($row["product_price"], 2, ',', '.'); ?>
                    </div>
                </div>
            <?php }
        } else {
            ?>
            <div class="card bg-dark w-100 text-center text-bg-light">
                <div class="card-body">
                    No products yet.
                </div>
            </div>
            <?php
        } ?>
    </div>
</div>

<script type="text/javascript">
    inputProductImage.onchange = evt => {
        const [file] = inputProductImage.files
        if (file) {
            productImagePreview.src = URL.createObjectURL(file)
        }
    }
</script>

<?php include('views/footer.php'); ?>