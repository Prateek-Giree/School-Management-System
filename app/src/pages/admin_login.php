<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin_login.css">
    <title>Admin Login</title>

</head>

<body>
    <div class="loginForm">
        <form action="../auth/adminlogin.php" method="post">
            <h2>Login as Admin</h2>
            <div class="inputBox">
                <input type="text" name="email" id="email" placeholder="Email" required="required" />
            </div>
            <div class="inputBox">
                <input type="password" name="pass" id="pass" placeholder="Password" required="required" />
                <i class="fa-solid fa-eye" id="togglePassword"></i>
            </div>
            <div class="inputBox">
                <input type="submit" name="" value="Login" />
            </div>
            <div class="back">
                <a href="../../public/index.php">Back to homepage</a>
            </div>
        </form>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>