<!-- BACKEND FOR CONTACT US PAGE -->
<html>

<body>
    <?php
    // Check if form data is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        /*using null coalescing operator to assign values to the varibles 
        if set & not null otherwise assign empty string */
        $fullName = $_POST["name"] ?? "";
        $email = $_POST["email"] ?? "";
        $message = $_POST["message"] ?? "";

        // Validate form data
        if (!empty($fullName) && !empty($email) && !empty($message)) {
            // Include database connection
            require_once("../includes/connection.php");

            // Prepare SQL statement
            $sql = "INSERT INTO contact (fullname, email, message) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bind_param("sss", $fullName, $email, $message);

            // Execute statement
            if ($stmt->execute()) {
                echo "<p>We received your message. We will get back to you soon. Thank you!</p>";
            } else {
                echo "<p>Sorry, we could not receive your message. Please try again later.</p>";
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        }
    } else {
        // Redirect to home page if accessed directly
        header("Location: ../../public/index.php");
        exit(); // Stop further execution
    }
    ?>
    <a href="../../public/index.php">Return to home page</a>
</body>

</html>