<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
    <style>
        .message {
            text-align: center;
            font-size: 18px;
            font-family: monospace;
        }

        .back {
            display: flex;
            justify-content: center;
        }

        .button {
            font-family: monospace;
            background: #085662;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 15px;
            border-radius: 5px;
            text-decoration: none;
        }

        .button:hover {
            background: #0b8fa3;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $admin_email = $_POST["email"];
        $password = $_POST["pass"];


        include_once "../includes/connection.php";

        // Prepare SQL query to check for the admin
        $sql = "SELECT * FROM user WHERE email=? AND password=? AND role=0";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $admin_email, $password);
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