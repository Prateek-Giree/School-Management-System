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
        if ($id == -1) {
            $query = "TRUNCATE TABLE contact";
            if ($conn->query($query) === TRUE) {
                echo "
                <script>
                alert('All messages deleted successfully');
                window.location.href = '../pages/messages.php';
                </script>";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        } else {
            $sql = "DELETE FROM contact WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "
                <script>
                alert('Record deleted successfully');
                window.location.href = '../pages/messages.php';
                </script>";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
    } else {
        header("Location: ../admin/admin_dashboard.php");
        exit();
    }
    $conn->close();
?>
<?php }
?>