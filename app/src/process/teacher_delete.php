<?php
session_start();
if (empty ($_SESSION['email']) || $_SESSION['role'] != 0) {
    header("Location:../../public/index.php");
    exit();
} else {
    include "../includes/connection.php";
    if (isset ($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM user WHERE uid=$id";

        if ($conn->query($sql) === TRUE) {
            if (isset ($_REQUEST['role'])) {
                echo "
                <script>
                    alert('Record deleted successfully');
                    window.location.href = '../pages/admin_profile.php#viewAdmins';
                </script>";
            }
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
}