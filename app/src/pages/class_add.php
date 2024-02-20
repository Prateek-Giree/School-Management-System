<?php
session_start();

// Redirect to index page if session dont exists
if (empty($_SESSION['email'])) {
    header('location:../../public/index.php');
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
        <link rel="stylesheet" href="../css/class.css">
        <title>Add class</title>
    </head>

    <body>
        <div class="container">
            <form action="#" method="get">
                <div class="content">
                    <h1 class="main_heading">Add Class</h1>
                    <input type="number" class="inputbox" placeholder="Enter Class" name="class" required min='1' max="10">
                    <div class="addclass">
                        <input type="submit" value="Add Class" class="btn1">
                    </div>
                </div>
            </form>
        </div>
    </body>

    </html>

    <?php
    if (isset($_GET['class'])) {
        $class = $_GET['class'];

        include_once "../includes/connection.php";

        $sql1 = "SELECT * FROM class where grade=?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("i", $class);
        $stmt1->execute();
        $result = $stmt1->get_result();
        if ($result->num_rows > 0) {
            echo " <script>
                            alert('Class already exists'); 
                            window.location.href='class_add.php'; 
                        </script>";
        } else {

            $sql2 = "INSERT INTO class(grade) VALUES (?)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("i", $class);
            if ($stmt2->execute()) {
                echo " <script>
                            alert('Class added successfully'); 
                            window.location.href='../admin/admin_dashboard.php'; 
                        </script>";
            } else {
                echo " <script>
                            alert('Something went wrong'); 
                            window.location.href='class_add.php'; 
                        </script>";
            }

            $stmt2->close();
        }
        $stmt2->close();
        $conn->close();
    }
?>
<?php
}
?>