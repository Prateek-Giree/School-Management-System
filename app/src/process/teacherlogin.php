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
        // Retrieve email and password from the form
        $teacher_email = $_POST["email"];
        $password = $_POST["pass"];

        // Include database connection file
        include_once "../includes/connection.php";

        // Prepare SQL query to check for the teacher
        $sql = "SELECT * FROM teacher WHERE email=? AND password=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $teacher_email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the teacher is found
        if ($result->num_rows > 0) {
            // Teacher found, set session variable and redirect to teacher panel
            $_SESSION["email"] = $teacher_email;
            header("location:../teacher/teacher_panel.php");
            exit(); // Exit to prevent further execution
        } else {
            // Teacher not found, display error message
            echo "<p class='message'>Teacher not found! <br> Please ask your administrator to register the teacher or Check if the provided credentials are correct</p>";
            echo "<br><br>";
            echo "<div class='back'><a href='../../public/index.php' class='button'>Go to Home page</a></div>";
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    } else {
        // If form is not submitted via POST method, redirect to login page
        header("location:login.php");
        exit(); // Exit to prevent further execution
    }
    ?>


</body>

</html>