<?php
if (empty($_SESSION['email'])|| $_SESSION['role'] != 0) {
    header("Location:../../public/index.php");
} else {
    include "../includes/connection.php";
    $role_header = 0;
    $email_header = $_SESSION['email'];
    $sql_header = "SELECT * FROM user where role=? and email=?";
    $stmt_header = $conn->prepare($sql_header);
    $stmt_header->bind_param("is", $role_header, $email_header);
    $stmt_header->execute();
    $result_header = $stmt_header->get_result();
    $name_header = "";
    if ($result_header->num_rows > 0) {
        $row_header = $result_header->fetch_assoc();
        $name_header = $row_header['name'];
    }
    $stmt_header->close();
    // Get the substring before the first whitespace ie first name
    $name_header = strstr($name_header, ' ', true);

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .welcome {
                display: flex;
                justify-content: space-between;
                width: 100%;
                color: orange;
                background-color: #fff;
                padding: 1rem;
                /* height: 11%; */
            }

            .welcome h1 {
                font-size: 2rem;
            }

            .welcome a {
                color: rgb(110, 109, 109);
                font-size: 2rem;
            }

            .welcome a:hover {
                color: rgb(148, 146, 146);
            }
        </style>
    </head>

    <body>
        <div class="welcome">
            <h1>Welcome to the admin panel,
                <?php echo $name_header; ?>
            </h1>
            <a href="../pages/admin_profile.php"><i class="fa-solid fa-gear"></i></a>
        </div>
    </body>

    </html>
    <?php
}
?>