<?php
session_start();
if (empty($_SESSION['email'])) {
    header("Location:../../public/index.php");
    exit();
} else {
    include "../includes/connection.php";
    $class = $_GET['id'];
    $query = "SELECT sid,name, address, contact FROM student where class=$class";
    $result_set = $conn->query($query);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin panel | Class details</title>
        <link rel="stylesheet" href="../css/view_table.css">
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

                    <table class="content-table">
                        <thead>
                            <tr class='title'>
                                <th colspan="4">
                                    <h1> Class
                                        <?php echo $class; ?>
                                    </h1>
                                </th>
                            </tr>
                            <tr class="heading">
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                if ($result_set->num_rows > 0) {
                                    while ($data = $result_set->fetch_assoc()) {
                                        echo "<tr>
                                                <td>" . $data['name'] . "</td>
                                                <td>" . $data['address'] . "</td>
                                                <td>" . $data['contact'] . "</td>
                                                <td><a href='student_edit.php?id=" . $data['sid'] . "'><i class='fa-solid fa-pen-to-square'  style='color:#2f7999;'></i></a>|
                                                <a href='javascript:void(0)' class='delete-link' onclick='checkStatus(" . $data['sid'] . ")' ; '><i class='fa-solid fa-trash'  style='color:#2f7999;'></i></a>
                                                </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<script>
                                        alert('No student found!');
                                        window.location.href='class_show.php';
                                    </script>";
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            function checkStatus(id) {
                var status = confirm("Are you sure you want to delete?");
                if (status) {
                    window.location.href = "student_delete.php?id=" + id + "&class=" + <?php echo $class; ?>;
                } else {
                    window.location.href = "class_details.php?id=" + $class;
                }
            }
        </script>
    </body>

    </html>
    <?php
}
?>