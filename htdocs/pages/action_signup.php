<?php
    # session_start() is to get the session navigation working through all the sections of the document. 
    session_start();
    include_once('../functions/functions.php');
    $dbConnect = dbLink();
    if($dbConnect){
        echo '<!-- Connection Established -->';
    }


    showMem();
    // SIGN UP VALIDATION

    # Esto es la POST MEMORY que viene del form en el file signUp_section.php
    # Esto esta diciendo que las variables de nuestra funcion son iguales a la informacion que nos viene del form
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];
    

    // Create a New User with password confirmation
    $validatePasswords = false;
    $validateUsername = false;

     if ($pwd != NULL && $pwd2 != NULL) {
         # If both passwords are provided, it sets $validatePassword to true.
         if ($pwd == $pwd2) {
         $validatePasswords = true;}
         # If either or both are missing, it sets $validatePassword to false.
     } else {
         $validatePasswords = false;
     }
    
     if ($uname != NULL) {
         $validateUsername = true;
     } else {
         $validateUsername = false;
     }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        // function bounce(){
        //     window.location.href="login_section.php";
        // }
    </script>
</head>
<body>
        <?php
            if ($validatePasswords && $validateUsername) {
                insertUser($dbConnect,$_POST['name'],$_POST['uname'],$_POST['pwd']);
            } else {
                // error message when passwords dont match
                echo '
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
                <a href="signUp_section.php"><div class="signUpButton2">Sign up</div></a>
                </header>
                <form action="action_signup.php" method="post" style="margin-top: 10vh; width:43vw; border:none; font-family: orbitron; box-shadow: none;">
                    <br>
                    <h3 style="font-family: orbitron; color: rgb(253, 39, 39); text-shadow: 2px -1px 7px rgb(253, 8, 0);">Your passwords don\'t match</h3>
                    <br>
                </form>';
                echo '
                <script>
                    function bounce(){
                        window.location.href = "signUp_section.php";
                    }
                    setTimeout(bounce, 1800);
                </script>';
                
            }
        ?>

</body>
</html>