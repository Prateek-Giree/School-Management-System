<?php
session_start();
if (empty($_SESSION['email'])) {
    header('Location:../../public/index.php');
} else {
    include_once "../includes/connection.php";
    $query = "SELECT * FROM contact";
    $result_set = $conn->query($query);

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin panel | Messages</title>
        <link rel="stylesheet" href="../css/messages.css">
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
                <div class="content" style="display:block;">
                    <div>
                        <table class="content-table">
                            <thead>
                                <tr class='title'>
                                    <th colspan="4">
                                        <h1> View Messages</h1>
                                    </th>
                                </tr>
                                <tr class="heading">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th style="width=60%;">Messages</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="text-align:justify;">
                                    <?php
                                    if ($result_set->num_rows > 0) {
                                        while ($data = $result_set->fetch_assoc()) {
                                            $id = $data['id'];
                                            $fullname = $data['fullname'];
                                            $email = $data['email'];
                                            $message = $data['message'];
                                            $time = $data['time'];

                                            echo "<tr>
                                                <td>" . htmlspecialchars($fullname) . "</td>
                                                <td> <a href='mailto:'" . $email . "' style='text-decoration:none;'>" . htmlspecialchars($email) . "</td>
                                                <td> <pre>" . wordwrap(htmlspecialchars($message), 50) . "</pre></td>
                                                <td>" . htmlspecialchars($time) . "</td>
                                                <td><a href='javascript:void(0)' onclick='checkStatus(" . $id . ")' ; '><i class='fa-solid fa-trash'></i></a>
                                                </td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<script>
                                             alert('No New Messages'); 
                                             window.location.href='../admin/admin_dashboard.php';
                                            </script>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="javascript:void(0)" onclick="checkStatus(-1);" class="delete">Delete all</a>
            </div>
        </div>
        <script>
            function checkStatus(id) {
                var status = confirm("Are you sure you want to delete?");
                if (status) {
                    window.location.href = "../process/message_delete.php?id=" + id;
                } else {
                    window.location.href = "messages.php";
                }
            }
        </script>
    </body>

    </html>
    <?php
}
?>