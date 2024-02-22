<?php
session_start();
if (empty($_SESSION['email'])) {
    header("Location:../../public/index.php");
    exit();
} else {
    include "../includes/connection.php";
    $sql = "SELECT * from user where role=1";
    $result = $conn->query($sql);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Admin Panel | class details</title>
    </head>

    <body style="background:gainsboro">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h2 class="display-6 text-center">
                                Teacher details
                            </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $id = $row['uid'];
                                            echo "<tr>
                                                <td>" . $row['name'] . "</td>
                                                <td>" . $row['address'] . "</td>
                                                <td>" . $row['contact'] . "</td>
                                                <td>" . $row['email'] . "</td>
                                                <td><a href='teacher_edit.php?id=" . $row['uid'] . "'><i class='fa-solid fa-pen-to-square'></i></a> ||
                                                <a href='javascript:void(0)' class='delete-link' onclick='checkStatus(" . $id . ")' ; '><i class='fa-solid fa-trash'></i></a>
                                                </td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<script>
                                             alert('No teacher found!');
                                             window.location.href='../admin/admin_dashboard.php';
                                            </script>";
                                    }
                                    ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
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

    </html>

    <?php
    $conn->close();
}
?>