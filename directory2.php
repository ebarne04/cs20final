<?php 
        $host = 'localhost';
        $user = 'uzs5ust30l2cr';
        $password = '32;1*Qu@qh`S';
        $dbname = 'dbbgsnjlxnbvya';

        $conn = new mysqli($host, $user, $password, $dbname);
        if($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM People WHERE on_campus = 0";
        $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
        <head>
                <meta charset="UTF-8">
                <link rel= "stylesheet" href="style.css">
                <link rel= "stylesheet" href="style2.css">
                <style type="text/css">
                        h1{
                                text-align: center;
                        }
                        .main-content h1::after {
                            content: "";
                            display: block;
                            width: 350px; /* Adjust width as desired */
                            height: 2px; /* Adjust thickness */
                            background-color: #F08080; /* Coral color for the line */
                            margin-top: 12px;
                        }
                </style>
        </head>
        <body>
        <nav>
        <div class="logo">
            <a href="index.html"><img src="NewLogo.png" alt="Logo"></a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li>
                <a href="#" class="dropdown">About</a>
                <ul class="dropdown-menu">
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="testimony.html">Testimonials</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown">Directory</a>
                <ul class="dropdown-menu">
                    <li><a href="directory1.php">On-Campus</a></li>
                    <li><a href="directory2.php">Off-Campus</a></li>
                </ul>
            </li>
            <li><a href="quiz.html">Survey</a></li>
        </ul>
    </nav>
                <div class="main-content">
                <h1> Off Campus Directory</h1>
                <div class="result-container">
                <?php 
                            if ($result->num_rows >0) {
                                        while ($row = $result->fetch_assoc()) {
                                                echo "<div class='person'>";
                                                echo "<img src='" . $row['img'] . "' alt='Photo of " . $row['name'] . "'>";
                                                echo "<h3>" . $row['name'] . "</h3>";
                                                echo "Hometown: " . $row['hometown'] . "<br>";
                                                echo "Major: " . $row['major'] . "<br>";
                                                echo "Gender: " . $row['gender'] . "<br>";
                                                echo "Cleanliness: " . $row['cleanliness'] . "/10<br>";
                                                echo "Wakeup: " . date("H:i", strtotime($row['wakeup'])) . "<br>";
                                                echo "Bedtime: " . date("H:i", strtotime($row['bedtime'])) . "<br>";
                                                echo "Smoker: " . ($row['smoker'] ? "Yes" : "No");
                                                echo "</div>";
                                        }
                            }
                        ?> 
                </div>
        </div>
        <footer>
                <div class="left-footer">
                    <img src="NewLogo.png" alt="Logo">
                    <p style="padding-top: 35px;">&copy; 2024 JumboMate. All Rights Reserved.</p>
                </div>
                <div class="right-footer">
                    <a href= "index.html">Home</a>
                    <a href= "about.html">About Us</a>
                    <a href= "contact.html">Contact</a>
                    <a href= "quiz.html">Quiz</a>
                </div>
            </footer>

            <script>
        document.addEventListener("DOMContentLoaded", () => {
            const hamburger = document.querySelector(".hamburger");
            const navLinks = document.querySelector(".nav-links");

            hamburger.addEventListener("click", () => {
                navLinks.classList.toggle("active");
            });
        });
    </script>


        </body>
</html>
<?php
    $conn->close();
?>