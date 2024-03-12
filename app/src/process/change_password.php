<?php
session_start();
if (empty($_SESSION['email'])) {
    header('location:../../public/index.php');
    exit();
} else {
    if (isset($_POST['oldpass'])) {
        include "../includes/connection.php";
        $oldpass = md5(trim($_POST['oldpass']));
        $newpass = trim($_POST['newpass']);
        $cpass = trim($_POST['cpass']);
        $email = $_SESSION['email'];

        $sql = "SELECT * FROM user WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($oldpass === $row['password']) {
                if ($newpass == $cpass) {
                    $newpass_hashed = md5($newpass);
                    $sql_update = "UPDATE user SET password=? WHERE email=?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param("ss", $newpass_hashed, $email);
                    if ($stmt_update->execute()) {
                        echo "<script>alert('Password changed successfully');</script>";
                        $stmt_update->close();
                        $stmt->close();
                        $conn->close();
                        session_unset();
                        session_destroy();
                        echo "<script>window.location.href='../../public/index.php';</script>";
                        exit();
                    } else {
                        echo "
                        <script>
                            alert('Error updating record:');
                            window.location.href = '../../public/index.php';
                        </script>";
                        exit();
                    }
                } else {
                    echo "
                    <script>
                        alert('New password and confirm password does not match');
                        window.location.href = '../pages/admin_profile.php#password';
                    </script>";
                }
            } else {
                echo "
                <script>
                    alert('Old password does not match');
                    window.location.href = '../pages/admin_profile.php#password';
                </script>";
            }

        } else {
            echo "
            <script>
                alert('User not found');
                window.location.href = '../../public/index.php';
            </script>";
        }
    } else {
        header("Location: ../admin/admin_dashboard.php");
        exit();
    }
}