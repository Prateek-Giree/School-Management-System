<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body>
    <?php
    session_start();

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $admin_email = $_POST["email"];
        $password = md5($_POST["pass"]);

        include_once "../includes/connection.php";

        // Prepare SQL query to check for the admin
        $sql = "SELECT * FROM user WHERE email=? AND password=? AND role=?";
        $role = 0; //for admin
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $admin_email, $password, $role);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // set session variable and redirect to admin panel
            $_SESSION["email"] = $admin_email;
            header("location:../admin/admin_dashboard.php");
            exit();
        } else {
            // echo "Invalid credentials";
            echo "<script>alert('Please enter valid credentials'); window.location.href='../pages/admin_login.php';</script>";
        }

        $stmt->close();
        $conn->close();
    } else {
        // If form is not submitted via POST method, redirect to login page
        header("location:../pages/admin_login.php");
        exit();
    }
    ?>


</body>

</html>