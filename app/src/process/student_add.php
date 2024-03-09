<!-- ADD STUDENT DATA IN DATABASE -->
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
        //check if form has been submitted
        if (isset($_POST['fullname'])) {
            include_once "../includes/connection.php";

            $errors = array();

            $fields = array(
                "fullname" => "Full Name",
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
                $name = trim($_POST['fullname']);
                $father = trim($_POST['father']);
                $mother = trim($_POST['mother']);
                $class = intval($_POST['class']);
                $address = trim($_POST['address']);
                $contact = trim($_POST['contact']);
                $dob = $_POST['dob'];
                $gender = $_POST['gender'];

                //check if class exists
                try {
                    $sql1 = "SELECT * FROM class WHERE grade=?";
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->bind_param("i", $class);
                    $stmt1->execute();
                    $result = $stmt1->get_result();

                    if ($result->num_rows > 0) {
                        try {
                            $sql2 = "INSERT INTO student(name,father,mother,class,address,contact,dob,gender)VALUES(?,?,?,?,?,?,?,?)";
                            $stmt2 = $conn->prepare($sql2);
                            $stmt2->bind_param("sssissss", $name, $father, $mother, $class, $address, $contact, $dob, $gender);
                            if ($stmt2->execute()) {
                                echo " <script>alert('Student registered successfully'); window.location.href='../admin/admin_dashboard.php'; </script>";
                            } else {
                                echo "<script>alert('Something went wrong'); window.location.href='../pages/student_add.php'; </script>";
                            }
                        } catch (Exception $e) {
                            echo '
                            <script>alert("Student with this contact info already exists' . '\n' . $e->getMessage() . '");
                                window.location.href = "../pages/student_add.php";
                            </script>';
                        } finally {
                            $stmt2->close();
                        }

                    } else {
                        echo "<script>
                    alert('Class do not exist'); 
                    window.location.href='../pages/student_add.php'; 
                    </script>";
                    }
                } catch (Exception $e) {
                    echo "<script>
                    alert('Error occured.\nError message:'" . $e->getMessage() . "); 
                    window.location.href='../pages/student_add.php'; 
                    </script>";
                } finally {
                    $stmt1->close();
                }
            }
            $conn->close();
        } else {
            header("Location: ../../public/index.php");
            exit();
        }
        ?>
    </body>

    </html>
    <?php
}
?>