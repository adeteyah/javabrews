<?php include('views/header.php'); ?>

<?php include('views/navbar.php'); ?>

<?php
$query = "SELECT * FROM `products`";
$result = $conn->query($query);
?>

<div class="container">
    <div class="container">
        <div class="row row-cols-4 gy-5">
            <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <div class="col">
                        <div class="card">
                            <div class="card text-bg-dark">
                                <img src="public/images/product_1.jpg" class="card-img img-fluid card-img-product" alt="...">
                                <div class="card-img-overlay d-flex flex-wrap flex-row align-self-end ">
                                    <h5 class="product-description">
                                        <?= $row["product_name"] ?>
                                    </h5>
                                    <p class="product-description">
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
                echo "0 results";
            } ?>
        </div>
    </div>
</div>

<?php include('views/footer.php'); ?>