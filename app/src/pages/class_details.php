<?php
session_start();
if (empty($_SESSION['email'])) {
    header("Location:../../public/index.php");
} else {
    include "../includes/connection.php";
    $class = $_GET['id'];
    $sql = "SELECT name, address, contact FROM student where class=$class";
    $result = $conn->query($sql);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Admin Panel | class details</title>
    </head>

    <body style="background:gainsboro">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h2 class="display-6 text-center">
                                Class
                                <?php echo $class; ?>
                            </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                </tr>
                                <tr>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                <td>" . $row['name'] . "</td>
                                                <td>" . $row['address'] . "</td>
                                                <td>" . $row['contact'] . "</td>
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