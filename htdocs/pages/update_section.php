<?php
        session_start();
        include_once('../functions/functions.php');
        $dbConnect = dbLink();
        if($dbConnect){
            echo '<!-- Conncection established-->';
        }
        showMem();

    # Esto autentifica la sesion 
    # This is the SESSION MEMORY, in other words, the info that we have in all our navigation time through the website
    if($_SESSION['authenticate'] == 'yes'){
        $validate = true;
       } else if ($validateUsername && $validatePassword) {
        $validate = validateUser($dbConnect,$uname, $pwd);
       }
     
    # Esta es la SESSION MEMORY, es decir, la info que tenemos en nuestra database, mas concretamente en nuestra tabla 'users' en las columna 'id'
    # Esto esta verificando que la info que metimos en <input name="name"> y <input name="pwd"> que enviamos en el archivo login.php , coincide exactamente con la que tenemos en nuestra database, mas concretamente esta diciendo que si nuestra columna 'id' es NULL no valide. else valida como true
    if($_SESSION['id']==NULL){
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $validate = validateUser($dbConnect,$uname, $pwd);
    }else{
    $validate=true;
    }

    $id = $_POST['postid'];
    $location = $_POST['location'];  
    $date = $_POST['date']  ;
    $time = $_POST['time'];
    $description = $_POST['desc']
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a post</title>
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
            <video src="../videos/DeepSpace.mp4" autoplay muted loop style="z-index: -1;  position: fixed; height:115vh"></video>
        </div>
        <?php
            if($validate){
                // $postid = $_GET['id'];    
                // $location = $_POST['localizacion'];    
                echo '<header class="headerPages">
                <!--logo-->
                <a href="../index.php" class="logoanchor"><div class="logo2"></div></a>
                <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="dashboard_section.php">Dashboard</a></li>
                    <li><a href="#">Add a post</a></li>
                </ul>
                </nav>
                <a href="login_section.php?logout=logout"><div class="logoutButton"><i style="position: absolute; margin-top: .23vh; margin-left:-1.75vw; font-size: 1.1em; color: rgba(210, 255, 6, 0.9); text-shadow: none" class="fa fa-power-off"></i>log out</div></a>
                </header>
                <br><br>
                <h3>Edit Post</h3>
                <br><br>
                <form action="action_update.php" method="post" class="form2" style="">
                        <br>
                        <input type="hidden" name="afterid" value="'.$id.'"><br>
                        <input type="text" name="afterlocation" value="' . $location . '" placeholder="Location" class="input2" style=" all:unset; color: #FFFFFF; background-color: rgba(0, 0, 0, 0.7); margin-top: 3.5vh;  border: 1px solid #D2FF06; border-radius: 10px; width: 20vw; font-family: orbitron; height: 5vh; padding-left: 0.5vw; display: block; margin: 1.5vh auto; text-transform: capitalize;">
                        <input type="date" name="afterdate" value="' . $date . '" placeholder="Location" class="input2" style=" all:unset; color: #FFFFFF; background-color: rgba(0, 0, 0, 0.7); margin-top: 3.5vh;  border: 1px solid #D2FF06; border-radius: 10px; width: 20vw; font-family: orbitron; height: 5vh; padding-left: 0.5vw; display: block; margin: 1.5vh auto; text-transform: capitalize;">
                        <input type="time" name="aftertime" value="' . $time. '" placeholder="Location" class="input2" style=" all:unset; color: #FFFFFF; background-color: rgba(0, 0, 0, 0.7); margin-top: 3.5vh;  border: 1px solid #D2FF06; border-radius: 10px; width: 20vw; font-family: orbitron; height: 5vh; padding-left: 0.5vw; display: block; margin: 1.5vh auto; text-transform: capitalize;">
                        <textarea name="afterdesc" class="input2" style="all:unset; color: #FFFFFF; background-color: rgba(0, 0, 0, 0.7); margin-top: 3.5vh; border: 1px solid #D2FF06; border-radius: 10px; width: 20vw; font-family: orbitron; height: 15vh; padding-left: 0.5vw; display: block; margin: 1.5vh auto; text-transform: capitalize;">'. $description . ' </textarea>;
                        <span id="login-span"></span>
                        <br><br><br>
                        <input type="submit" value="Save" id="login-submit-button">
                        <br>
                </form>
                ';
            } else {
                echo '<header class="headerNotLoggedin">
                <!--logo-->
                <a href="../index.php" class="logoanchor"><div class="logo2"></div></a>
                <nav>
                  <ul>
                      <li>
                      <!-- <a href="../index.php">Home</a> -->
                      </li>
                      <li>
                      <!-- <a href="../pages/login_section.php">Dashboard</a> -->
                      </li>
                  </ul>
                </nav>
                <a href="pages/login_section.php"><div class="logoutButton">log in</div></a>
                <a href="pages/signUp_section.php"><div class="signUpButton">Sign up </div></a>
            </header>';

            }
            ?>
        <br><br><br><br><br><br>
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