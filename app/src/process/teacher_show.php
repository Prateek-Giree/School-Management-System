<?php
session_start();
if (empty ($_SESSION['email'])) {
    header("Location:../../public/index.php");
    exit();
} else {
    include "../includes/connection.php";
    $query = "SELECT * from user where role=1";
    $result_set = $conn->query($query);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        if ($_SESSION['role'] == 0) {
            ?>
            <title>Admin panel | View teachers</title>
            <?php
        } else {
            ?>
            <title>Teacher panel | View teachers</title>
            <?php
        }
        ?>
        <link rel="stylesheet" href="../css/view_table.css">
    </head>

    <body>
        <div class="container">
            <div class="left">
                <?php
                if ($_SESSION['role'] == 0) {
                    include_once "../includes/admin_sidebar.php";
                } else {
                    include_once "../includes/teacher_sidebar.php";
                }
                ?>
            </div>
            <div class="right">
                <div class="include">
                    <?php
                    if ($_SESSION['role'] == 0) {
                        include_once "../includes/header.php";
                    } else {
                        include_once "../includes/teacher_header.php";
                    }
                    ?>
                </div>
                <div class="content" style="display:block;">
                    <div>
                        <table class="content-table">
                            <thead>
                                <tr class='title'>
                                    <th colspan="5">
                                        <h1> View Teachers</h1>
                                    </th>
                                </tr>
                                <tr class="heading">
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <?php
                                    if ($_SESSION['role'] == 0) {
                                        ?>
                                        <th>Action</th>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="text-align:justify;">
                                    <?php
                                    if ($result_set->num_rows > 0) {
                                        while ($data = $result_set->fetch_assoc()) {
                                            $id = $data['uid'];
                                            $name = $data['name'];
                                            $address = $data['address'];
                                            $contact = $data['contact'];
                                            $email = $data['email'];

                                            echo "<tr>
                                                <td>" . htmlspecialchars($name) . "</td>
                                                <td>" . htmlspecialchars($address) . "</td>
                                                <td>" . htmlspecialchars($contact) . "</td>
                                                <td> <a href='mailto:'" . $email . "' style='text-decoration:none;'>" . htmlspecialchars($email) . "</td>";
                                            if ($_SESSION['role'] == 0) {
                                                echo "
                                                    <td><a href='teacher_edit.php?id=" . $id . "'><i class='fa-solid fa-pen-to-square' style='color:#2f7999;'></i></a> ||
                                                    <a href='javascript:void(0)' onclick='checkStatus(" . $id . ")' ; '><i class='fa-solid fa-trash' style='color:#2f7999;'></i></a>
                                                    </td>
                                                    </tr>";
                                            }
                                        }
                                    } else {
                                        echo "<script>
                                             alert('No teacher found!'); 
                                             window.location.href='../admin/admin_dashboard.php';
                                            </script>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <script>
                    function checkStatus(id) {
                        var status = confirm("Are you sure you want to delete?");
                        if (status) {
                            window.location.href = "teacher_delete.php?id=" + id;
                        } else {
                            window.location.href = "teacher_show.php";
                        }
                    }
                </script>
    </body>

    </html>
    <?php
}
?>