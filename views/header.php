<?php
include('pages/conn.php');
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url, 'pages') !== false) {
    $currPageIsIndex = false; //subpages
} else {
    $currPageIsIndex = true; //index
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Java Brews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <?php
    if ($currPageIsIndex) {
        ?>
        <link rel="stylesheet" href="assets/css/style.css">
        <?php
    } else {
        ?>
        <link rel="stylesheet" href="../assets/css/style.css">
        <?php
    }
    ?>
</head>

<body class="text-light">