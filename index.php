<?php include('views/header.php'); ?>

<?php include('views/navbar.php'); ?>

<?php
$query = "SELECT * FROM `products`";
$result = $conn->query($query);
?>

<div class="container">
    <div class="row">
        <div class="d-flex flex-column align-items-center col col-2">
            <div class="ratio ratio ratio-1x1">
                <img id="productImagePreview" src="public/images/imagePlacholder.jpg"
                    class="rounded-circle object-fit-cover">
            </div>
            <small class="mt-3">Preview Product Image</small>
        </div>
        <div class="col col-10">
            <form enctype="multipart/form-data" action="pages/add-product.php" method="post">
                <div class="container">
                    <h5 class="mb-3">Add Product</h5>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputProductName" class="small form-label">Nama Produk</label>
                            <input name="inputProductName" type="text" class="form-control form-control-sm"
                                id="inputProductName">
                        </div>
                        <div class="col">
                            <label for="inputProductDescription" class="small form-label">Deskripsi Produk</label>
                            <input name="inputProductDescription" type="text" class="form-control form-control-sm"
                                id="inputProductDescription">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="inputProductPrice" class="small form-label">Harga Produk</label>
                            <input required name="inputProductPrice" type="number" min="0"
                                class="form-control form-control-sm" id="inputProductPrice">
                        </div>
                        <div class="col">
                            <label for="inputProductImage" class="small form-label">Foto Produk</label>
                            <input required name="inputProductImage" class="form-control form-control-sm" type="file"
                                accept="image/*" id="inputProductImage">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="reset" class="btn btn-primary btn-sm w-100">
                        </div>
                        <div class="col">
                            <input name="inputAdd" type="submit" class="btn btn-primary btn-sm w-100">
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
                    <div class="product">
                        <div class="card">
                            <div class="card text-bg-dark ratio ratio-1x1">
                                <img src="public/products/<?= $row["product_image"] ?>"
                                    class="card-img card-img-product  object-fit-cover" alt="<?= $row["product_image"] ?>"
                                    title="<?= $row["product_name"] ?>">
                                <div class="card-img-overlay d-flex flex-wrap align-content-end">
                                    <p class="w-100 h5 fw-bold product-description">
                                        <?= $row["product_name"] ?>
                                    </p>
                                    <p class="w-100 product-description">
                                        <?= $row["product_description"] ?>
                                    </p>
                                    <p class="w-100 product-price">
                                        <?= "Rp. " . number_format($row["product_price"], 2, ',', '.'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="product-option py-3">
                            <div class="d-grid gap-2 d-md-block">
                                <a class="btn btn-primary"
                                    href="pages/edit-product.php?product_id=<?= $row["product_id"] ?>">Edit</a>
                                <a class="btn btn-secondary"
                                    href="pages/delete-product.php?product_id=<?= $row["product_id"] ?>">Delete</a>
                            </div>
                        </div>
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