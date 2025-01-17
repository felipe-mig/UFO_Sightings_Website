<?php
        session_start();
        include_once('../functions/functions.php');
        $dbConnect = dbLink();
        if($dbConnect){
            echo '<!-- Conncection established-->';
        }

        showMem();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Section</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @font-face {
            font-family: alien;
            src: url(../fonts/AlienEnergy-mLr92.ttf)
        }
        @font-face {
            font-family: orbitron;
            src: url(../fonts/Orbitron-VariableFont_wght.ttf);
        }
        
    </style>
</head>
<body style="background-color: #000000;">
        <div class="ctaVideoContainer" style="z-index: -1; ">
            <video src="../videos/DeepSpace.mp4" autoplay muted loop style="z-index: -1; position: absolute; height:115vh"></video>
        </div>
    <header class="notLoggedinHeader">
          <!--logo-->
          <a href="../index.php" class="logoanchor"><div class="logo2"></div></a>
          <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <!-- <li><a href="../index.php">Dashboard</a></li> -->

            </ul>
          </nav>
          <?php
        //   echo '<a href="signUp_section.php"><div class="signUpButton">Sign in</div></a>';
           echo '<a href="login_section.php"><div class="logoutButton" style="width: 6.5vw">log in</div></a>';
            
           
            ?>
        </header>
        <br>
        <h3>Get started in UFO</h3>
        <br>
        <br>
        <form action="action_signup.php" method="post" style="margin-bottom: 12vh;">
                <br>
                <input type="text" name="name" value="" class="name-text" placeholder="Enter name">
                <input type="text" name="uname" value="" class="name-text" placeholder="Enter Username">
                <input type="password" name="pwd" value="" class="text" placeholder="Enter Password">
                <input type="password" name="pwd2" value="" class="text" placeholder="Confirm Password">
                <span id="login-span"></span>
                <br><br><br>
                <input type="submit" value="sign up" id="login-submit-button">
                <br>
        </form>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
            <br><br>
        <footer>
            <br>
            <!--social media-->
        <div class="copy-and-terms-container">
          <div class="social-media-container">
              <a href="https://github.com/felipe-mig" target="_blank"><i class="bi bi-github" id="giticon"></i></a>
              <a href="https://www.linkedin.com/in/felipeiglesiasgarcia/" target="_blank"><i class="bi bi-linkedin" id="linkedinicon"></i></a>
          </div>
          <p id="copyright">&copy; <span style="letter-spacing: 0.5em; font-size: .8em; text-transform:uppercase">2024 Felipe Iglesias Garcia</span></p>
        </div>
        <!-- <br> -->
    </footer>
        
</body>
</html>