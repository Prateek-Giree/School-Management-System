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
        $email = $_POST['email'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpass'];

        if ($password == $cpassword) {
            include_once "../includes/connection.php";

            $sql = "INSERT INTO user(name,email,address,contact,role,password)VALUES(?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssis", $name, $email, $address, $contact, $role, $password);
            if ($stmt->execute()) {
                echo " <script>
                            alert('Registered successfully'); 
                            window.location.href='../admin/admin_dashboard.php'; 
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
            echo " <script>
                        alert('Password and confirm password did not match');
                        window.location.href='../pages/teacher_add.php'
                    </script>";

        }
    } else {
        header("Location: ../../public/index.php");
        exit();
    }
    ?>
</body>

</html>