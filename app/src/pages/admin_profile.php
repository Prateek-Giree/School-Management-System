<?php
session_start();

// Redirect to index page if session dont exists
if (empty($_SESSION['email']) || $_SESSION['role'] != 0) {
    header('location:../../public/index.php');
    exit();
} else {
    include_once "../includes/connection.php";

    //for currently logged in admin
    $query = "SELECT * FROM user WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result_set = $stmt->get_result();
    $data = $result_set->fetch_assoc();
    $stmt->close();

    //for deleting other admin
    $query1 = "SELECT * FROM user where role=0";
    $result_set = $conn->query($query1);
    $conn->close();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="../js/script.js"></script>
        <link rel="stylesheet" href="../css/admin_pages.css">
        <link rel="stylesheet" href="../css/admin_profile.css">
        <link rel="stylesheet" href="../css/view_table.css">
        <title>Admin Panel | Admin profile</title>
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
                <div class="info">
                    <h1>My information</h1>
                    <div class="details">
                        <div class="show">
                            <h3>Personal details</h3>
                            <span>Name:
                                <?php echo $data['name']; ?>
                            </span>
                            <span>Email:
                                <?php echo $data['email']; ?>
                            </span>
                            <span>Address:
                                <?php echo $data['address']; ?>
                            </span>
                            <span>Contact:
                                <?php echo $data['contact']; ?>
                            </span>
                        </div>
                        <div class="line"></div>

                        <div class="update">
                            <h3>Update details</h3>
                            <form action="../process/teacher_update.php" method="post"
                                onsubmit="return validateUserUpdateForm()">
                                <input type="hidden" name="id" value="<?php echo $data['uid']; ?>">
                                <input type="hidden" name="urladmin" value="-1">
                                <div class="inputbox">
                                    <label for="">Full Name:</label>
                                    <input name="fullname" type="text" onblur="nameValidation('updateName','nameUpdateErr')"
                                        id="updateName" value="<?php echo $data['name']; ?>">
                                    <span id="nameUpdateErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Email:</label>
                                    <input name="email" type="text" id="updateEmail"
                                        onblur="emailValidation('updateEmail','emailUpdateErr')"
                                        value="<?php echo $data['email']; ?>">
                                    <span id="emailUpdateErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Address:</label>
                                    <input name="address" type="text" id="updateAddress"
                                        onblur="addressValidation('updateAddress','addressUpdateErr')"
                                        value="<?php echo $data['address']; ?>">
                                    <span id="addressUpdateErr"></span>
                                </div>
                                <div class="inputbox">
                                    <label for="">Contact no.:</label>
                                    <input name="contact" type="text" id="updateContact" oninput="limitContactLength(this)"
                                        onblur="contactUpdateValidation('updateContact','contactUpdateErr')"
                                        value="<?php echo $data['contact']; ?>">
                                    <span id="contactUpdateErr"></span>
                                </div>
                                <div class="inputbox">
                                    <input type="submit" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="password" id="password">
                    <h1>Change Password</h1>
                    <form action="../process/change_password.php" method="post"
                        onsubmit="return passwordValidation('newpass','newPassErr') && checkPass('cnewpass','newpass','cnewPassErr')">
                        <div class="inputbox">
                            <div class="password-input">
                                <label for="">Old Password:</label>
                                <input type="password" name="oldpass" id="oldpass" required>
                                <i class="fa-solid fa-eye" onclick="togglePasswordVisibility('oldpass')"></i>
                            </div>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <div class="password-input">
                                <label for="">New Password:</label>
                                <input type="password" name="newpass" id="newpass"
                                    onblur="passwordValidation('newpass','newPassErr')" required>
                                <i class="fa-solid fa-eye" onclick="togglePasswordVisibility('newpass')"></i>
                            </div>
                            <span id="newPassErr"></span>
                        </div>
                        <div class="inputbox">
                            <div class="password-input">
                                <label for="">Confirm Password:</label>
                                <input type="password" name="cpass" id="cnewpass"
                                    onblur="checkPass('cnewpass','newpass','cnewPassErr')" required>
                                <i class="fa-solid fa-eye" onclick="togglePasswordVisibility('cnewpass')"></i>
                            </div>
                            <span id="cnewPassErr"></span>
                        </div>
                        <div class="inputbox">
                            <input type="submit" value="Change">
                        </div>
                    </form>
                </div>
                <div class="newAdmin">
                    <h1 id="admin">Add New Admin</h1>
                    <form action="../process/teacher_add.php" method="post" onsubmit="return validateUserInsertionForm()">
                        <input type="hidden" name="urladmin" value="-1">
                        <div class="inputbox">
                            <label for="">Full Name:</label>
                            <input type="text" name="fullname" id="fullname" placeholder="Full Name"
                                onblur="nameValidation('fullname','nameErr')" required>
                            <span id="nameErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Email:</label>
                            <input name="email" type="text" id="email" placeholder="Email"
                                onblur="emailValidation('email', 'emailErr')" required>
                            <span id="emailErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Address:</label>
                            <input name="address" type="text" id="address" placeholder="Address"
                                onblur="addressValidation('address', 'addressErr')" required>
                            <span id="addressErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Contact:</label>
                            <input name="contact" type="text" id="contact" placeholder="Contact"
                                oninput="limitContactLength(this)" onblur="contactValidation('contact', 'contactErr')"
                                required>
                            <span id="contactErr"></span>
                        </div>
                        <div class="inputbox">
                            <label for="">Role:</label>
                            <input name="role" type="text" id="role" value="Admin" readonly>
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <div class="password-input">
                                <label for="">Password:</label>
                                <input name="password" type="password" id="pass" placeholder="Password"
                                    onblur="passwordValidation('pass', 'passwordErr')" required>
                                <i class="fa-solid fa-eye" onclick="togglePasswordVisibility('pass')"></i>
                            </div>
                            <span id="passwordErr"></span>
                        </div>
                        <div class="inputbox">
                            <div class="password-input">
                                <label for="">Confirm Password:</label>
                                <input name="cpass" type="password" id="cpass" placeholder="Confirm Password"
                                    onblur="checkPass('cpass', 'pass', 'cpassErr')" required>
                                <i class="fa-solid fa-eye" onclick="togglePasswordVisibility('cpass')"></i>
                            </div>
                            <span id="cpassErr"></span>
                        </div>
                        <div class="inputbox">
                            <input type="submit" value="Add">
                        </div>
                    </form>
                </div>

                <div id="viewAdmins">
                    <table class="content-table">
                        <thead>
                            <tr class='title'>
                                <th colspan="3">
                                    <h1> Delete admin</h1>
                                </th>
                            </tr>
                            <tr class="heading" style="text-align:center;">
                                <th>Name</th>
                                <th>Contact no.</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result_set->num_rows > 0) {
                                while ($data = $result_set->fetch_assoc()) {
                                    $id = $data['uid'];
                                    $role = $data['role'];
                                    $name = $data['name'];
                                    $contact = $data['contact'];

                                    echo "<tr style='text-align:center;'>
                                                <td>" . htmlspecialchars($name) . "</td>
                                                <td>" . htmlspecialchars($contact) . "</td>
                                                <td><a href='javascript:void(0)' onclick='checkStatus(" . $id . "," . $role . ")' ; '><i class='fa-solid fa-trash' style='color:#2f7999;'></i></a>
                                                </td>
                                            </tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="../js/validation.js"></script>
        <script>
            function checkStatus(id, role) {
                var status = confirm("Are you sure you want to delete?");
                if (status) {
                    window.location.href = "../process/teacher_delete.php?id=" + id + "&role=" + role;
                } else {
                    window.location.href = "admin_profile.php#viewAdmins";
                }
            }
        </script>
    </body>
    <?php
}
?>