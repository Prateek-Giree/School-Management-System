<!-- ADD STUDENT DATA IN DATABASE -->
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
        $name = $_POST['fullname'];
        $father = $_POST['father'];
        $mother = $_POST['mother'];
        $class = $_POST['class'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

        include_once "../includes/connection.php";

        $sql1 = "SELECT * FROM class WHERE grade=?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("i", $class);
        $stmt1->execute();
        $result = $stmt1->get_result();

        if ($result->num_rows > 0) {
            $sql2 = "INSERT INTO student(name,father,mother,class,address,contact,dob,gender)VALUES(?,?,?,?,?,?,?,?)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("sssissss", $name, $father, $mother, $class, $address, $contact, $dob, $gender);
            if ($stmt2->execute()) {
                echo " <script>alert('Student registered successfully'); window.location.href='../admin/admin_dashboard.php'; </script>";
            } else {
                echo "<script>alert('Something went wrong'); window.location.href='../pages/add_student.php'; </script>";

            }
            $stmt2->close();

        } else {
            echo "<script>alert('Class do not exist'); window.location.href='../pages/student_add.php'; </script>";
        }
        $stmt1->close();
        $conn->close();
    } else {
        header("Location: ../../public/index.php");
        exit();
    }
    ?>
</body>

</html>