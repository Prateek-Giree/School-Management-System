<?php
session_start();
//check if the user is logged in or not
if (empty($_SESSION['email'])) {
    header('location:../../public/index.php');
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

        <?php
        // Check if form has been submitted
        if (isset($_POST['fullname'])) {
            include_once "../includes/connection.php";
            $stmt = null;
            $errors = array();

            $fields = array(
                "fullname" => "Full Name",
                "email" => "Email",
                "address" => "Address",
                "contact" => "Contact number",
                "role" => "Role",
                "password" => "Password",
                "cpass" => "Confirm Password"
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
                } elseif ($field == "password") {
                    if (strlen($_POST[$field]) < 8) {
                        $errors[$field] = "{$label} should be at least 8 characters long";
                    }
                    if (strtolower($_POST[$field]) === strtolower("Password")) {
                        $errors[$field] = "{$label} cannot not be password";
                    }
                    if (!preg_match('/^(?=.*[A-Za-z])(?=.*[^A-Za-z0-9]).{8,25}$/', $_POST[$field])) {
                        $errors[$field] = "{$label} should contain alphabet and at least one special character";
                    }
                }
            }

            if (!empty($errors)) {
                foreach ($errors as $error) {
                    // echo "<p>{$error}<p>";
                    if (isset($_REQUEST['url'])) {
                        echo "<script>alert('{$error}');
                            window.location.href = '../pages/admin_profile.php#admin';
                            </script>";
                    } else {
                        echo "<script>alert('{$error}');
                                    window.location.href = '../pages/teacher_add.php';
                            </script>";
                    }

                }
            } else {
                $name = trim($_POST['fullname']);
                $email = $_POST['email'];
                $address = $_POST['address'];
                $contact = $_POST['contact'];
                $role = intval($_POST['role']);
                $password = md5(trim($_POST['password']));
                $cpassword = md5(trim($_POST['cpass']));

                if ($password != $cpassword) {
                    //For admin registration via admin setting page
                    if (isset($_REQUEST['urladmin'])) {
                        echo "<script>alert('Password and confirm password did not match');
                            window.location.href = '../pages/admin_profile.php#admin';
                            </script>";
                    } else {
                        echo "<script>alert('Password and confirm password did not match');
                                    window.location.href = '../pages/teacher_add.php';
                            </script>";
                    }

                } else {
                    try {
                        // Prepare and execute SQL statement
                        $sql = "INSERT INTO user (name, email, address, contact, role, password) VALUES (?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssssis", $name, $email, $address, $contact, $role, $password);

                        if ($stmt->execute()) {
                            echo "<script>alert('Registered successfully');
                            window.location.href ='../admin/admin_dashboard.php';</script>";
                            exit();
                        } else {
                            echo "<script>alert('Something went wrong');
                            window.location.href = '../admin/admin_dashboard.php';</script>";
                            exit();
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

                    }
                }
            }
            // Close statement and connection
            if ($stmt !== null) {
                $stmt->close();
            }
            $conn->close();
        } else {
            header("Location:../admin/admin_dashboard.php");
            exit();
        }
        ?>
    </body>

    </html>
    <?php
}
?>