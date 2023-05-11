<?php include('../views/header.php'); ?>

<?php include('../views/navbar.php'); ?>

<form action="" method="post">
    <div class="container">
        <h5 class="mb-5">Add Product</h5>
        <div class="mb-3 row">
            <label for="inputProductName" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputProductName">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputProductDescription" class="col-sm-2 col-form-label">Product Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputProductDescription">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputProductPrice" class="col-sm-2 col-form-label">Product Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputProductPrice">
            </div>
        </div>
        <div class="mt-5 row">
            <input type="submit" class="form-control">
        </div>
    </div>
</form>

<?php include('../views/footer.php'); ?>