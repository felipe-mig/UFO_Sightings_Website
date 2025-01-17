<?php
    session_start();
    include_once('../functions/functions.php');
    $dbConnect = dbLink();
    if($dbConnect){
        echo '<!-- Conncection established-->';
    }

    showMem();
    
    // Validation

    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

        # This is the POST MEMORY, in other words, the info that we are sending from our form in login.php
    # We have <input name="name"> 
    if ($_POST['uname'] != NULL){
        $validateUsername = true;
    } else {
        $validateUsername = false;
    }
    # This is the POST MEMORY, in other words, the info that we are sending from our form in login.php
    # We have <input name="pwd"> 
    if ($_POST['pwd'] != NULL){
        $validatePassword = true;
    } else {
        $validatePassword = false;
    }
    # Esto autentifica la sesion 
    # This is the SESSION MEMORY, in other words, the info that we have in all our navigation time through the website
    if($_SESSION['authenticate'] == 'yes'){
        $validate = true;
    } else if ($validateUsername && $validatePassword){
      $validate = validateUser($dbConnect, $uname, $pwd);  
    }
    # Esta es la SESSION MEMORY, es decir, la info que tenemos en nuestra database, mas concretamente en nuestra tabla 'users' en las columna 'id'
    # Esto esta verificando que la info que metimos en <input name="name"> y <input name="pwd"> que enviamos en el archivo login.php , coincide exactamente con la que tenemos en nuestra database, mas concretamente esta diciendo que si nuestra columna 'id' es NULL no valide. else valida como true
    if($_SESSION['id'] == NULL){
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        $validate = validateUser($dbConnect, $uname, $pwd);
    }else{
        $validate = true;
    }
    // Logout
    # Este 'logout' viene de '<li><a href="../pages/login.php?logout=logout">Log out</a></li>'; que tenemos en el file dashboard.php y en las demas secciones.
    if($_GET['logout'] == 'logout'){
        # Session_unset() tells the browser to remove the current session id.
        session_unset();
        # session_destroy() clears the session cache.
        session_destroy();
        # session_regenerate_id() creates a new session id for the next person logging in.
        session_regenerate_id();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Section</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
<body >
        <div class="ctaVideoContainer" style="z-index: -1; ">
            <video src="../videos/DeepSpace.mp4" autoplay muted loop style="z-index: -1; position: fixed; height:115vh"></video>
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
          echo '<a href="signUp_section.php"><div class="signUpButton2">Sign up</div></a>';
        //    echo '<a href="#"><div class="logoutButton">log in</div></a>';
        //    echo '<div class="logoutButtonHidden"></div>';
            
           
            ?>
        </header>
        <br>
        <h3>log in to UFO</h3>
        <br><br>
        <form action="dashboard_section.php" method="post">
                <br>
                <input type="text" name="uname" value="" class="name-text" placeholder="Enter Username">
                <input type="password" name="pwd" value="" class="text" placeholder="Enter Password">
                <span id="login-span"></span>
                <br><br><br>
                <input type="submit" value="Log in" id="login-submit-button">
                <br>
        </form>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
            <br><br><br><br>
            <br><br><br><br>
            <br><br><br><br>
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