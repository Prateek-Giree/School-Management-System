<?php
session_start();

// Redirect to index page if session dont exists
if (empty($_SESSION['email']) || $_SESSION['role'] != 0) {
    header('location:../../public/index.php');
    exit();
} else {
    include "../includes/connection.php";
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $sql = "select * from user where uid=$id ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Admin Panel | Edit teacher</title>
                <link rel="stylesheet" href="../css/admin_pages.css">
                <link rel="stylesheet" href="../css/admin_profile.css">
            </head>

            <body>
                <div class="container">
                    <div class="left">
                        <?php
                        include_once "../includes/admin_sidebar.php";
                        ?>
                    </div>
                    <div class="right">
                        <div class="include">
                            <?php include_once "../includes/header.php"; ?>
                        </div>

                        <div class="newAdmin">
                            <h1 id="admin">Update teacher details</h1>
                            <form action="../process/teacher_update.php" method="post" onsubmit="return validateUserUpdateForm()">
                                <input type="hidden" name="id" value="<?php echo $row['uid']; ?>">
                                <div class="inputbox">
                                    <label for="">Full Name:</label>
                                    <input type="text" name="fullname" id="updateName"
                                        onblur="nameValidation('updateName','nameUpdateErr')" value="<?php echo $row['name']; ?>"
                                        placeholder="Full Name" required>
                                    <span id="nameUpdateErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Email:</label>
                                    <input name="email" type="text" id="updateEmail"
                                        onblur="emailValidation('updateEmail','emailUpdateErr')"
                                        value="<?php echo $row['email']; ?>" placeholder="Email" required>
                                    <span id="emailUpdateErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Address:</label>
                                    <input name="address" type="text" id="updateAddress"
                                        onblur="addressValidation('updateAddress','addressUpdateErr')"
                                        value="<?php echo $row['address']; ?>" placeholder="Address" required>
                                    <span id="addressUpdateErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Contact:</label>
                                    <input name="contact" type="text" id="updateContact" oninput="limitContactLength(this)"
                                        onblur="contactUpdateValidation('updateContact','contactUpdateErr')"
                                        value="<?php echo $row['contact']; ?>" placeholder="Contact" required>
                                    <span id="contactUpdateErr"></span>
                                </div>
                                <div class="inputbox">
                                    <input type="submit" value="Update">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <script src="../js/validation.js"></script>
            </body>

            </html>
            <?php
            $conn->close();

        }
    } else {
        header("Location: ../admin/admin_dashboard.php");
        exit();
    }
}
?>