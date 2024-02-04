<!-- BACKEND FOR CONTACT US PAGE -->
<html>

<body>
    <?php
    if (isset($_REQUEST["name"])) {
        // Retrieve form data
        $fullName = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        include_once("../includes/connection.php");

        // Insert data into the database
        $sql = "INSERT INTO contact (fullname, email, message) VALUES ('$fullName', '$email', '$message')";
        $result = $conn->query($sql);
        if ($result) {
            echo "<p>We received your message. We will get back to you soon. Thank you!</p>";
        } else {
            echo "<p>Sorry, we could not receive your message. Please try again later.</p>";
        }
        $conn->close();
    }
    ?>
    <a href="../../public/index.php">Return to home page</a>
</body>

</html>