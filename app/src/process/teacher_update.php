<?php
session_start();
if (empty($_SESSION['email'])) {
    header('location:../../public/index.php');
    exit();
} else {
    //check if form has been submitted
    if (isset($_POST['fullname'])) {
        include_once "../includes/connection.php";
        $stmt = null;
        $errors = array();

        $fields = array(
            "fullname" => "Full Name",
            "email" => "Email",
            "address" => "Address",
            "contact" => "Contact number",
        );
        foreach ($fields as $field => $label) {
            if ($_POST[$field] == '') {
                $errors[$field] = "{$label} is required";
            } elseif (preg_match("/^\s*$/", $_POST[$field])) {
                $errors[$field] = "{$field} is invalid ";
            } elseif ($field == "fullname" && !preg_match("/^[a-zA-Z ]{4,}$/", $_POST[$field])) {
                $errors[$field] = "Name should only contain alphabet and be at least 4 characters long";
            } elseif ($field == "email" && !filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
                $errors[$field] = "{$_POST[$field]} is invalid email format";
            } elseif ($field == "contact" && !preg_match("/^(98|97)\d{8}$/", $_POST[$field])) {
                $errors[$field] = "{$_POST[$field]} is invalid contact number";
            }
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                // echo "<p>{$error}<p>";
                if (isset($_REQUEST['urladmin'])) {
                    echo "<script>alert('{$error}');
                        window.location.href = '../pages/admin_profile.php';
                        </script>";
                } else {
                    echo "<script>alert('{$error}');
                                window.location.href = '../pages/teacher_add.php';
                        </script>";
                }

            }
        } else {
            try {
                $id = $_POST['id'];
                $name = $_POST['fullname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $contact = $_POST['contact'];

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
            } catch (Exception $e) {
                //For admin registration via admin setting page
                if (isset($_REQUEST['urladmin'])) {
                    echo "<script>alert('Admin with this contact info already exists');
                                window.location.href = '../pages/admin_profile.php#admin';
                        </script>";
                } else {
                    echo "<script>alert('Teacher with this contact info already exists');
                            window.location.href = '../pages/teacher_add.php';
                        </script>";
                }
            } finally {
                if ($stmt != null) {
                    $stmt->close();
                }
                $conn->close();
            }
        }
    } else {
        header("Location: ../admin/admin_dashboard.php");
        exit();
    }
}