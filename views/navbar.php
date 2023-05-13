<nav class="navbar navbar-expand-lg my-5">
    <div class="container">
        <a class="navbar-brand" href="<?= $_SERVER['REQUEST_URI'] ?>" style="width: 180px;">
            <?php
            if ($currPageIsIndex) {
                ?>
                <img src="assets/img/java_brews.png">
                <?php
            } else {
                ?>
                <img src="../assets/img/java_brews.png">
                <?php
            }
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <?php if ($currPageIsIndex) {
                ?>
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="index.php">Link 1</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="index.php">Link 2</a>
                    </li>
                </ul>
                <?php
            } else {
                ?>
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="../index.php">Link 1</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="../index.php">Link 2</a>
                    </li>
                </ul>
                <?php
            } ?>

        </div>
    </div>
</nav>