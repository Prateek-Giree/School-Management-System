<?php
session_start();
if (empty($_SESSION['email'])) {
    header("Location:../public/index.php");
    exit();
} else {
    include "../includes/connection.php";
    $query = "SELECT * FROM class";
    $result_set = $conn->query($query);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin panel | View class</title>
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
                                <th colspan="3">
                                    <h1> View Class</h1>
                                </th>
                            </tr>
                            <tr class="heading" style="text-align:center;">
                                <th>Class</th>
                                <th>Total students</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                if ($result_set->num_rows > 0) {
                                    while ($data = $result_set->fetch_assoc()) {
                                        $class_id = $data['grade'];
                                        $count_query = "SELECT COUNT(*) AS total_students FROM student WHERE class = $class_id";
                                        $count_result = $conn->query($count_query);
                                        $row = $count_result->fetch_assoc();
                                        $total_students = $row['total_students'];

                                        echo "<tr style='text-align:center;'>
                                                <td>" . $data['grade'] . "</td>
                                                <td>" . $total_students . "</td>
                                                <td><a href='class_details.php?id=" . $data['grade'] . "'><i class='fa-solid fa-eye'  style='color:#2f7999;'></i></a></td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<script>
                                                alert('No class found!');
                                                window.location.href='../admin/admin_dashboard.php';
                                            </script>";
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
}
?>