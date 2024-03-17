<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
</head>

<body>
    <?php
    session_start();

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve email and password from the form
        $teacher_email = $_POST["email"];
        $password = trim(md5($_POST["pass"]));


        include_once "../includes/connection.php";

        // Prepare SQL query to check for the teacher
        $sql = "SELECT * FROM user WHERE email=? AND password=? AND role=1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $teacher_email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Teacher found, set session variable and redirect to teacher panel
            $_SESSION["email"] = $teacher_email;
            $_SESSION['role'] = 1;
            header("location:../teacher/teacher_dashboard.php");
            exit(); // Exit to prevent further execution
        } else {
            // Teacher not found, display error message
            echo "<script>alert('Teacher not found.'); window.location.href='../../public/index.php';</script>";
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    } else {
        // If form is not submitted via POST method, redirect to login page
        header("location:../../public/index.php");
        exit();
    }
    ?>


</body>

</html>