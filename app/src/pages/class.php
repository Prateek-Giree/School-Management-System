<?php
session_start();
include('../includes/connection.php');

// Redirect to index page if session dont exists
if (empty($_SESSION['email'])) {
    header('location:../../public/index.php');
    exit();
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/class.css">
        <title>Admin Panel | Class</title>
    </head>

    <body>
        <div class="container">
            <div class="left">
                <?php
                include_once "../includes/admin_sidebar.php";
                ?>
            </div>
            <div class="right">
                <div class="include">
                    <?php include_once "../includes/header.php"; ?>
                </div>
                <div class="content">
                    <div class="show"><a href="class_show.php">show classes <i class="fa-regular fa-eye"></i> </a></div>
                    <div class="add"><a href="class_add.php">Add classes <i class="fa-solid fa-plus"></i> </a></div>
                </div>
            </div>
        </div>

        <?php
}
?>