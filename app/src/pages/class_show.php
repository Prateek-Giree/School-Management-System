<?php
session_start();
if (empty($_SESSION['email'])) {
    header("Location:../admin/admin_dashboard.php");
    exit();
} else {
    include "../includes/connection.php";
    $sql = "SELECT * FROM class";
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
        <title>Admin Panel | View class</title>
    </head>

    <body style="background:gainsboro">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h2 class="display-6 text-center">
                                Classes
                            </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th>Class</th>
                                    <th>Details</th>
                                </tr>
                                <tr>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                <td>" . $row['grade'] . "</td>
                                                <td><a href='class_details.php?id=" . $row['grade'] . "'><i class='fa-solid fa-eye'></i></a></td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<script>
                                                alert('No class found!');
                                                window.location.href='class_show.php';
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

    </html>
<?php }
?>