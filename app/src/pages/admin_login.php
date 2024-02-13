<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_login.css">
    <title>Admin Login</title>

</head>

<body>
    <div class="loginForm">
        <form action="../process/adminlogin.php" method="post">
            <h2>Login as Admin</h2>
            <div class="inputBox">
                <input type="text" name="email" id="email" placeholder="Email" required="required" />
            </div>
            <div class="inputBox">
                <input type="password" name="pass" id="pass" placeholder="Password" required="required" />
            </div>
            <div class="inputBox">
                <input type="submit" name="" value="Login" />
            </div>
            <div class="back">
                <a href="../../public/index.php">Back to homepage</a>
            </div>
        </form>
    </div>
</body>

</html>