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
        $id = $_POST['id'];
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        include_once "../includes/connection.php";

        $sql = "UPDATE  user set name=?,email=?,address=?,contact=? where uid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $address, $contact, $id);
        if ($stmt->execute()) {
            echo " <script>
                            alert('Details updated successfully'); 
                            window.location.href='../pages/teacher_show.php'; 
                        </script>";
        } else {
            echo " <script>
                            alert('Something went wrong'); 
                            window.location.href='../admin/admin_dashboard.php'; 
                        </script>";

        }
        $stmt->close();
        $conn->close();


    } else {
        header("Location: ../../public/index.php");
        exit();
    }
    ?>
</body>

</html>