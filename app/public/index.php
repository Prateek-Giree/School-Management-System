<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../src/js/script.js"></script>
    <title>Home</title>
    <link rel="stylesheet" href="../src/css/index.css">

</head>

<body>
    <!-- Navbar  -->
    <section class="Main">
        <header>
            <nav class="navbar">
                <div class="logo"> <a href="#">School Management<br>System</a></div>
                <ul class="links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="../src/pages/admin_login.php">Admin</a></li>
                </ul>
            </nav>
        </header>

        <!-- Hero section  -->
        <main>
            <section class="hero">
                <div class="welcome">
                    <h1>XYZ School</h1>
                    <p>Welcome to the Heart of Educational Excellence! Our School Management System:
                        <span id="element"></span>
                    </p>
                </div>

                <div class="loginForm">
                    <form action="../src/auth/teacherlogin.php" method="post">
                        <h2>Login as teacher</h2>
                        <div class="inputBox">
                            <input type="text" name="email" id="email" required="required" />
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="pass" id="pass" required="required" />
                            <span>Password</span>
                            <i class="fa-solid fa-eye" onclick="togglePasswordVisibility('pass')"></i>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="" value="Login" />
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </section>


    <!-- ABOUT  -->
    <section class="about" id="about">
        <div class="image">
            <img src="../src/assets/students.jpg" alt="">
        </div>
        <div class="content">
            <h1>About us</h1>
            <p>At XYZ School, we believe in fostering a positive and inclusive learning environment for students. Our
                team of dedicated teachers and administrators work together to ensure that every student receives the
                support they need to thrive academically and personally.
            </p>
            <p> We are committed to providing a safe and nurturing environment for all students, and we strive to create
                an atmosphere where students feel comfortable expressing themselves and exploring their interests. We
                offer a wide range of extracurricular activities, including sports teams, clubs, and community service
                opportunities. Our goal is to help students develop into well-rounded individuals who are prepared for
                success in college and beyond.</p>
            </p>
            <div class="social">
                <span>Follow us on:</span>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </section>
    <!-- Contact us  -->
    <section class="contact" id="contact">
        <div class="content">
            <h2>Contact Us</h2>
        </div>
        <div class="Container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>
                            Khairahani-08, Parsa <br />Chitwan
                        </p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Contact</h3>
                        <p>056-565656</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>
                            <a href="mailto:XYZSchool.info@gmail.com">XYZSchool.info@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="contactForm">
                <form action="../src/process/contact.php" method="post"
                    onsubmit="return nameValidation('name','nameErr') && emailValidation('email1','emailErr') && validateMessage('message','messageErr') ">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="name" id="name" onblur="nameValidation('name','nameErr')"
                            required="required" />
                        <span>Full Name</span>
                    </div>
                    <span style="color: rgb(232, 21, 35); display:block; height: 10px;" id="nameErr"></span>

                    <div class="inputBox">
                        <input type="email" name="email" id="email1" onblur="emailValidation('email1','emailErr')"
                            required="required" />
                        <span>Email</span>
                    </div>
                    <span style="color: rgb(232, 21, 35); display:block; height: 10px;" id="emailErr"></span>

                    <div class="inputBox">
                        <textarea required="required" id="message" name="message"></textarea>
                        <span>Type your Message...</span>
                    </div>
                    <span id="messageCount" style="color:white; display:block; height:10px;"></span> <br>
                    <span style="color: rgb(232, 21, 35); display:block; height: 10px;" id="messageErr"></span>

                    <div class="inputBox">
                        <input type="submit" name="" value="Send" />
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer  -->
    <section class="footer">
        <div class="foot">
            <div class="logo"> <span> School </span> <span> Management</span> <span> System</span></div>
            <div class="nav">
                <h1>Navigation</h1>
                <ul class="footernav">
                    <li><a href="#"> Home </a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="hero">Admin</a></li>
                </ul>
            </div>
            <div class="footercontact">
                <h1>Contact</h1>
                <p>Khairahani-08, Parsa <br />Chitwan</p>
                <p>056-565656</p>
                <p>
                    <a href="mailto:XYZSchool.info@gmail.com">XYZSchool.info@gmail.com</a>
                </p>
            </div>
        </div>
        <div class="footersocial">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
    </section>
    <section class="copyright">
        <div class="content">
            <p> &copy; 2024 <span>Pratik</span> & <span>Sabin</span> | All Rights Reserved</p>
        </div>
    </section>

    <!-- Script  -->
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src='../src/js/validation.js'></script>
    <script type="text/javascript">
        // typing animation script
        var typed = new Typed('#element', {
            strings: [' Revolutionizing Education.', 'Streamlining Administration.', 'Simplifying Administration.'],
            typeSpeed: 50,
            loop: true,
        });


        document.addEventListener("DOMContentLoaded", function () {
            var messageTextarea = document.getElementById("message");

            // Attach event listeners for input and blur events
            messageTextarea.addEventListener("input", function () {
                updateWordCount('message', 'messageCount');
            });

            messageTextarea.addEventListener("blur", function () {
                validateMessage('message', 'messageErr');
            });
        });

    </script>
</body>

</html>