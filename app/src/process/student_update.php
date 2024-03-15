<?php
session_start();
if (empty($_SESSION['email'])) {
    header('location:../../public/index.php');
    exit();
} else {
    //check if form has been submitted
    if (isset($_POST['id'])) {
        include_once "../includes/connection.php";
        $fields = array(
            "fullname" => "Full Name",
            "roll" => "Roll number",
            "father" => "Father's Name",
            "mother" => "Mother's Name",
            "class" => "Class",
            "address" => "Address",
            "contact" => "Contact number",
            "dob" => "Date of Birth",
            "gender" => "Gender"
        );
        foreach ($fields as $field => $label) {
            if ($_POST[$field] == '') {
                $errors[$field] = "{$field} is required";
            } elseif (preg_match("/^\s*$/", $_POST[$field])) {
                $errors[$field] = "{$field} is invalid ";
            } elseif ($field == "fullname" && !preg_match("/^[a-zA-Z ]{4,}$/", $_POST[$field])) {
                $errors[$field] = "Name should only contain alphabet and be at least 4 characters long";
            } elseif ($field == "roll" && !preg_match("/^[0-9]{1,}$/", $_POST[$field])) {
                $error[$field] = "{$label} is invalid";
            } elseif ($field == "father" && !preg_match("/^[a-zA-Z ]{4,}$/", $_POST[$field])) {
                $errors[$field] = "Name should only contain alphabet and be at least 4 characters long";
            } elseif ($field == "mother" && !preg_match("/^[a-zA-Z ]{4,}$/", $_POST[$field])) {
                $errors[$field] = "Name should only contain alphabet and be at least 4 characters long";
            } elseif ($field == "class" && (intval($_POST[$field]) < 1 || intval($_POST[$field] > 10))) {
                $errors[$field] = "Such {$label} do not exist";
            } elseif ($field == "contact" && !preg_match("/^(98|97)\d{8}$/", $_POST[$field])) {
                $errors[$field] = "{$_POST[$field]} is invalid contact number";
            } elseif ($field == "dob") {
                $dob = $_POST[$field];
                $today = new DateTime();
                $birthdate = new DateTime($dob);
                $age = intval($birthdate->diff($today)->y);
                if ($age <= 6 || $age >= 16) {
                    $errors[$field] = "Age must be greater than 6 and less than 16";
                }
            } elseif ($field == "gender" && !preg_match("/^(male|female|others)$/", strtolower($_POST[$field]))) {
                $errors[$field] = "Invalid {$label}";
            }
        }
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<script>alert('{$error}');
                window.location.href = '../pages/student_add.php';
                </script>";
            }
        } else {
            $id = $_POST['id'];
            $name = $_POST['fullname'];
            $father = $_POST['father'];
            $mother = $_POST['mother'];
            $class = $_POST['class'];
            $roll = $_POST['roll'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            try {
                //check if class exists
                $sql1 = "SELECT * FROM class WHERE grade=?";
                $stmt1 = $conn->prepare($sql1);
                $stmt1->bind_param("i", $class);
                $stmt1->execute();
                $result = $stmt1->get_result();
                $stmt2 = null;
                if ($result->num_rows > 0) {
                    try {
                        $sql2 = "UPDATE  student set name=?,father=?,mother=?,class=?,roll=?,address=?,contact=?,dob=?,gender=? WHERE sid=?";
                        $stmt2 = $conn->prepare($sql2);
                        $stmt2->bind_param("sssiissssi", $name, $father, $mother, $class, $roll, $address, $contact, $dob, $gender, $id);
                        if ($stmt2->execute()) {
                            if (!empty($_REQUEST['class_id'])) {
                                $class_id = $_REQUEST['class_id'];
                                echo " <script>alert('Details updated successfully'); window.location.href='../process/class_details.php?id=$class_id'; </script>";
                            } else {
                                echo " <script>alert('Details updated successfully'); window.location.href='student_show.php'; </script>";
                            }
                        } else {
                            echo "<script>alert('Something went wrong'); window.location.href='../admin/admin_dashboard.php'; </script>";
                        }
                    } catch (Exception $e) {
                        if ($e->getCode() == 1062) {
                            preg_match("/Duplicate entry '(.+)' for key '(.+)'/", $e->getMessage(), $matches);
                            if (isset($matches[1]) && preg_match("/($class+)-($roll)/", $matches[1])) {
                                $violatingData = "Class: $class, Roll: $roll";
                            } else {
                                $violatingData = $matches[1];
                            }
                            echo '
                            <script>
                                alert("Student with following record: ' . '\n' . $violatingData . ' already exists");
                                window.location.href = "../pages/student_add.php";
                            </script>';

                        } else {
                            echo '
                            <script>alert("Error occured while inserting data' . '\n' . $e->getMessage() . '");
                            window.location.href = "../pages/student_add.php";
                            </script>';
                        }
                    } finally {
                        if ($stmt2 !== null) {
                            $stmt2->close();
                        }
                    }
                } else {
                    echo "<script>alert('Class do not exist'); window.location.href='../pages/student_add.php'; </script>";
                }
                $stmt1->close();
            } catch (Exception $e) {
                echo "<script>
                alert('Error occured.\nError message:'" . $e->getMessage() . "); 
                window.location.href='../pages/student_add.php'; 
                </script>";
            } finally {
                if ($stmt1 !== null) {
                    $stmt1->close();
                }
            }
        }
        $conn->close();
    } else {
        header("Location: ../admin/admin_dashboard.php");
        exit();
    }
}