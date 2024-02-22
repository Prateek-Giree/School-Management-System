<?php
session_start();
if (empty($_SESSION['email'])) {
    header("Location:../../public/index.php");
    exit();
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

    </body>

    </html>
    <?php
    include "../includes/connection.php";
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM user WHERE uid=$id";

        if ($conn->query($sql) === TRUE) {
            echo "
    <script>
        alert('Record deleted successfully');
        window.location.href = 'teacher_show.php';
    </script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        header("Location: ../admin/admin_dashboard.php");
        exit();
    }
    $conn->close();
?>
<?php }
?>