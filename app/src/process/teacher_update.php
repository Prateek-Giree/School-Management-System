<?php
session_start();
if (empty($_SESSION['email'])) {
    header('location:../../public/index.php');
    exit();
} else {
    //check if form has been submitted
    if (isset($_POST['fullname'])) {
        $id = $_POST['id'];
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        include_once "../includes/connection.php";

        $sql = "UPDATE  user set name=?,email=?,address=?,contact=? where uid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $address, $contact, $id);
        if ($stmt->execute()) {
            //For admin
            if (isset($_POST['urladmin'])) {
                //changing session email to new email
                $_SESSION['email'] = $email;
                echo " <script>
                alert('Details updated successfully');
                window.location.href='../pages/admin_profile.php'; 
                </script>";
            } else {
                //For teacher
                echo " <script>
                alert('Details updated successfully'); 
                window.location.href='../process/teacher_show.php'; 
                </script>";
            }
        } else {
            echo " <script>
                            alert('Something went wrong'); 
                            window.location.href='../admin/admin_dashboard.php'; 
                        </script>";

        }
        $stmt->close();
        $conn->close();


    } else {
        header("Location: ../admin/admin_dashboard.php");
        exit();
    }
}