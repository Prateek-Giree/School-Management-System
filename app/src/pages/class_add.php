<?php
session_start();

// Redirect to index page if session dont exists
if (empty ($_SESSION['email']) || $_SESSION['role'] != 0) {
    header('location:../../public/index.php');
    exit();
} else {
    include "../includes/connection.php";
    $sql = "SELECT * FROM class";
    $result = $conn->query($sql);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/class.css">
        <link rel="stylesheet" href="../css/admin_pages.css">
        <title>Admin panel | Add class</title>
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
                <div class="content">
                    <div class="box">
                        <form action="#" method="get" onsubmit="return validate();">
                            <div class="input">
                                <h1 class="main_heading">Add Class</h1>
                                <input type="number" class="inputbox" placeholder="Enter Class" id="class" name="class"
                                    required min='1' max="10" autofocus>
                                <div class="addclass">
                                    <input type="submit" value="Add Class" class="btn1">
                                </div>
                                <span id="errorMsg"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type='text/javascript'>
            function validate() {
                var inputclass = document.getElementById("class").value;
                if (inputclass == "") {
                    document.getElementById("errorMsg").innerHTML = "Class is required";
                    setTimeout(() => {
                        document.getElementById("errorMsg").innerHTML = "";
                    }, 2000);
                    return false;
                }
                if (inputclass < 1 || inputclass > 10) {
                    document.getElementById("errorMsg").innerHTML = "Class should be between 1 to 10";
                    setTimeout(() => {
                        document.getElementById("errorMsg").innerHTML = "";
                    }, 2000);
                    return false;
                }
                return true;
            }
        </script>
    </body>


    </html>

    <?php
    if (isset ($_GET['class'])) {
        $class = $_GET['class'];
        if ($class == '') {
            echo " <script>
                        alert('Class is required');
                        window.location.href='class_add.php';
                    </script>";
        } elseif ($class > 10 || $class < 1) {
            echo " <script>
                        alert('Class should be between 1 to 10'); 
                        window.location.href='class_add.php'; 
                    </script>";
        } else {

            include_once "../includes/connection.php";

            $sql1 = "SELECT * FROM class where grade=?";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bind_param("i", $class);
            $stmt1->execute();
            $result = $stmt1->get_result();
            if ($result->num_rows > 0) {
                echo " <script>
                            alert('Class already exists'); 
                            window.location.href='class_add.php'; 
                            </script>";
            } else {

                $sql2 = "INSERT INTO class(grade) VALUES (?)";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("i", $class);
                if ($stmt2->execute()) {
                    echo " <script>
                            alert('Class added successfully'); 
                            window.location.href='../admin/admin_dashboard.php'; 
                            </script>";
                } else {
                    echo " <script>
                            alert('Something went wrong'); 
                            window.location.href='class_add.php'; 
                        </script>";
                }

                $stmt2->close();
            }
            $stmt2->close();
            $conn->close();
        }
    }
?>
<?php
}
?>