<?php
// session_start();
// //error_reporting(0);
// include('includes/dbconnection.php');

// // Redirect to index page if session dont exists
// if (empty($_SESSION['username'])) {
//     header('location:../../public/index.php');
//     exit();
//} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin_dashboard.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="main">
        <div class="title">
            <p>Report Summary</p>
        </div>
        <div class="report">
            <div class="content">
                <div class="card">
                    <p>Total class:</p>
                    <p>
                        0<!-- php code to display total class  -->
                    </p>
                    <a href="">View class</a>
                </div>
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>
            <div class="content">
                <div class="card">
                    <p>Total Teachers:</p>
                    <p>
                        0 <!-- php code to display total class  -->
                    </p>
                    <a href="">View teachers</a>
                </div>
                <i class="fa-solid fa-user-graduate"></i>
            </div>
            <div class="content">
                <div class="card">
                    <p>Total Students:</p>
                    <p>
                        0 <!-- php code to display total class  -->
                    </p>
                    <a href="">View students</a>
                </div>
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
    </div>
</body>

</html>

<?php
// }
?>