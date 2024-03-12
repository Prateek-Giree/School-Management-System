<?php
session_start();
if (empty($_SESSION['email'])) {
    header('location:../../public/index.php');
    exit();
} else {
    //check if form has been submitted
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $name = $_POST['fullname'];
        $father = $_POST['father'];
        $mother = $_POST['mother'];
        $class = $_POST['class'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

        include_once "../includes/connection.php";
        //check if class exists
        $sql1 = "SELECT * FROM class WHERE grade=?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("i", $class);
        $stmt1->execute();
        $result = $stmt1->get_result();

        if ($result->num_rows > 0) {
            $sql2 = "UPDATE  student set name=?,father=?,mother=?,class=?,address=?,contact=?,dob=?,gender=? WHERE sid=?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("sssissssi", $name, $father, $mother, $class, $address, $contact, $dob, $gender, $id);
            if ($stmt2->execute()) {
                echo " <script>alert('Details updated successfully'); window.location.href='student_show.php'; </script>";
            } else {
                echo "<script>alert('Something went wrong'); window.location.href='../admin/admin_dashboard.php'; </script>";

            }
            $stmt2->close();

        } else {
            echo "<script>alert('Class do not exist'); window.location.href='../pages/student_add.php'; </script>";
        }
        $stmt1->close();
        $conn->close();
    } else {
        header("Location: ../admin/admin_dashboard.php");
        exit();
    }
}