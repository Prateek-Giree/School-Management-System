<?php
session_start();

// Redirect to index page if session dont exists
if (empty($_SESSION['email'])) {
    header('location:../../public/index.php');
    exit();
} else {
    include('../includes/connection.php');
    // Query to fetch total number of classes
    $sqlTotolClasses = "SELECT * FROM class";
    $queryTotalClasses = $conn->query($sqlTotolClasses);
    $resultTotalClasses = [];
    while ($row = $queryTotalClasses->fetch_assoc()) {
        $resultTotalClasses[] = $row;
    }
    $totalClasses = count($resultTotalClasses);

    // Query to fetch total number of teachers
    $sqlTotolTeachers = "SELECT * FROM user";
    $queryTotalTeachers = $conn->query($sqlTotolTeachers);
    $resultTotalTeachers = [];
    while ($row = $queryTotalTeachers->fetch_assoc()) {
        $resultTotalTeachers[] = $row;
    }
    $totalTeachers = count($resultTotalTeachers);

    // Query to fetch total number of students
    $sqlTotolStudents = "SELECT * FROM student";
    $queryTotalStudents = $conn->query($sqlTotolStudents);
    $resultTotalStudents = [];
    while ($row = $queryTotalStudents->fetch_assoc()) {
        $resultTotalStudents[] = $row;
    }
    $totalStudents = count($resultTotalStudents);

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
        <link rel="stylesheet" href="../css/admin_dashboard.css">
        <title>Admin Panel | Dashboard</title>
    </head>

    <body>
        <div class="hero">
            <?php
            include_once "../includes/admin_sidebar.php";
            ?>
            <div class="outer">
                <?php
                include_once "../includes/header.php";
                ?>
                <div class="main">
                    <div class="title">
                        <p>Report Summary</p>
                    </div>
                    <div class="report">
                        <div class="content">
                            <div class="card">
                                <p>Total class:</p>
                                <p>
                                    <?php echo $totalClasses; ?>
                                </p>
                                <a href="../process/class_show.php">View class</a>
                            </div>
                            <i class="fa            s fa-users"></i>
                        </div>
                        <div class="content">
                            <div class="card">
                                <p>Total Teachers:</p>
                                <p>
                                    <?php echo $totalTeachers; ?>
                                </p>
                                <a href="../process/teacher_show.php">View teachers</a>
                            </div>
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        <div class="content">
                            <div class="card">
                                <p>Total Students:</p>
                                <p>
                                    <?php echo $totalStudents; ?>
                                </p>
                                <a href="../process/student_show.php">View students</a>
                            </div>
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

    <?php
}
?>