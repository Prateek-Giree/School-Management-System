<?php
session_start();
if (empty ($_SESSION['email'])) {
    header("Location:../../public/index.php");
    exit();
} else {
    include "../includes/connection.php";
    $query = "SELECT * from student order by class,roll";
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
            <title>Admin panel | View students</title>
            <?php
        } else {
            ?>
            <title>Teacher panel | View students</title>
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
                <div class="content">
                    <div>
                        <table class="content-table">
                            <thead>
                                <tr class='title'>
                                    <th colspan="9">
                                        <h1> View Students</h1>
                                    </th>
                                </tr>
                                <tr class="heading">
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Parents</th>
                                    <th>Admission Date</th>
                                    <th>Class</th>
                                    <th>Roll no.</th>
                                    <th>Gender</th>
                                    <th>Date of birth</th>
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
                                            echo "<tr>
                                            <td>" . $data['name'] . "</td>
                                            <td>" . $data['address'] . "</td>
                                            <td>" . $data['contact'] . "</td>
                                            <td>" . $data['father'] ?><br>
                                            <?php echo $data['mother'] . "</td>
                                            <td>" . $data['admission'] . "</td>
                                            <td>" . $data['class'] . "</td>
                                            <td>" . $data['roll'] . "</td>
                                            <td>" . $data['gender'] . "</td>
                                            <td>" . $data['dob'] . "</td>";
                                            if ($_SESSION['role'] == 0) {
                                                echo " <td><a href='student_edit.php?id=" . $data['sid'] . "'><i class='fa-solid fa-pen-to-square'  style='color:#2f7999;'></i></a>|
                                                <a href='javascript:void(0)' class='delete-link' onclick='checkStatus(" . $data['sid'] . ")' ; '><i class='fa-solid fa-trash'  style='color:#2f7999;'></i></a>
                                                </td>
                                                </tr>";
                                            }
                                        }
                                    } else {
                                        echo "<script>
                                             alert('No student found!'); 
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
                            window.location.href = "student_delete.php?id=" + id;
                        } else {
                            window.location.href = "student_show.php";
                        }
                    }
                </script>
    </body>

    </html>
    <?php
    $conn->close();
}
?>