<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Teacher</title>
    <link rel="stylesheet" href="../css/signup.css">
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>Don't have an <br> account ?</h1>
            <p>Register here to access the full feature of SMS.</p>
        </div>
        <div class="signup">
            <form action="../auth/register.php" method="post" onclick="return validate();">
                <h1>Register Teacher</h1>
                <div class="inputBox">
                    <input type="text" id="fullname" required>
                    <span>Full Name</span>
                </div>
                <div class="inputBox">
                    <input type="text" id="email" required>
                    <span>Email</span>
                </div>
                <div class="inputBox">
                    <input type="text" id="address" required>
                    <span>Address</span>
                </div>
                <div class="inputBox">
                    <input type="text" id="phone" required>
                    <span>Phone</span>
                </div>
                <div class="inputBox">
                    <input type="password" id="pass" required>
                    <span>Password</span>
                </div>
                <div class="inputBox">
                    <input type="password" id="cpass" required>
                    <span>Confirm Password</span>
                </div>
                <button type="submit">Signup</button>

                <a href="../../public/index.php">Already have an account?</a>

            </form>
        </div>
    </div>
</body>

</html>