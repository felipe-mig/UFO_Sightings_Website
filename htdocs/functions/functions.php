<?php

// Database connection
function dbLink(){
    $dbHost = "localhost";
    $dbUser = "mri";
    $dbPassword = "password";
    $db = "ufo";

    $mysqli = new mysqli($dbHost, $dbUser, $dbPassword, $db);

    if($mysqli->connect_errno){
        echo 'Failed to connect: ';
        $mysqli->connect_errno;
    }
    error_reporting(0);
    return $mysqli;
}

// shows what's in the memory

    
function showMem(){
            echo '<div style="background-color: rgba(0, 0, 0, 0.7); height: auto; width: 17vw; margin-top: 25vh; margin-bottom: 1vh;  color: rgba(210, 255, 6, 0.7); border-top-right-radius: 20px; border-bottom-left-radius: 1px; border-top-left-radius: 1px; border-bottom-right-radius: 20px; position: fixed; font-family: Impact; font-size: 1em; letter-spacing: 0.25em; text-transform: uppercase; padding-left: 1vw; padding-right: 1vw; box-shadow: inset 0px 0px 20px 2px rgba(210, 255, 6, 0.3), 0px 0px 2.5px 2.5px rgba(210, 255, 6, 0.5);">';
                echo '<pre>';
                echo '<br>';
                echo '<h5 style="font-size: 1.25em;  letter-spacing: 0.25em;">SHOW MEMORY</h5>';
                echo '<br>';
                echo '<h5 style="font-size: 1.1em; letter-spacing: 0.25em; text-transform: uppercase;">Get Memory</h5>';
                print_r($_GET);
                echo '<br>';
                echo '<h5 style="font-size: 1.1em; letter-spacing: 0.25em; text-transform: uppercase;">Post Memory</h5>';
                print_r($_POST);
                echo '<br>';
                echo '<h5 style="font-size: 1.1em; letter-spacing: 0.25em; text-transform: uppercase;">Session Memory</h5>';
                print_r($_SESSION);
                echo '<br>';
                echo '</pre>';
                echo '<br>';
            echo '</div>';
    
}

// function showMem(){
//     echo '<div style="background-color: rgba(255, 0, 0, 0.5); box-shadow: inset 0px 0px 10px 2px rgba(255, 50, 50, 0.3); height: auto; width: 17vw; border-top: 2.5px solid #000000; border-right: 5px solid #000000; border-bottom: 5px solid #000000; border-left: 2.5px solid #000000; margin-top: 25vh; margin-bottom: 1vh;  color: #E6E250; border-radius: 50px; border-top-left-radius: 1px; border-bottom-left-radius: 1px; position: fixed; font-family: Impact; font-size: .em; letter-spacing: 0.25em; text-transform: uppercase; padding-left: 1vw">';
//         echo '<pre>';
//         echo '<br>';
//         echo '<h5 style="font-size: 1.25em;  letter-spacing: 0.25em;">SHOW MEMORY</h5>';
//         echo '<br>';
//         echo '<h5 style="font-size: 1.1em; letter-spacing: 0.25em; text-transform: uppercase;">Get Memory</h5>';
//         print_r($_GET);
//         echo '<br>';
//         echo '<h5 style="font-size: 1.1em; letter-spacing: 0.25em; text-transform: uppercase;">Post Memory</h5>';
//         print_r($_POST);
//         echo '<br>';
//         echo '<h5 style="font-size: 1.1em; letter-spacing: 0.25em; text-transform: uppercase;">Session Memory</h5>';
//         print_r($_SESSION);
//         echo '<br>';
//         echo '</pre>';
//         echo '<br>';
//     echo '</div>';    
// }


// LOGIN
// Validate user
function validateUser($dbConnect,$uname, $pwd){
    $sql = "SELECT * FROM users";
    $result = mysqli_query($dbConnect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            #utiliza dos == porque esta comparando que la columna 'user' sea exactamente igual a la variable $uname. Si son iguales devuleve true.
            if($row['username'] == $uname){
                if($row['password'] == $pwd){
                    # El operador = se usa para asignar un valor a una variable.
                    # Aqui, = se usa para asignar el valor de $row['id'] a $_SESSION['id']. Esto almacena el ID del usuario en la sesion.
                    $_SESSION['id'] = $row['id'];
                    # Esto autentifica la sesion 
                    $_SESSION['authenticate'] = 'yes';
                    return true;
                }
            }
        }
    }
}

// CREATE a post
function insertPost($dbConnect,$location,$date,$time,$description){
    $sql="INSERT INTO post (id, localizacion, fecha, tiempo, descripcion) VALUES(NULL,'$location','$date','$time','$description')";
    if(mysqli_query($dbConnect,$sql)){
        echo '<p style="color: red;">Post deleted</p>';
    }else {
        echo 'Error: '.$dbConnect->error;
    }

}

// CREATE a new user (Sign Up)
function insertUser($dbConnect,$name,$uname,$pwd){
    $sql="INSERT INTO users (id, name, username, password) VALUES(NULL,'$name','$uname','$pwd')";
    if(mysqli_query($dbConnect,$sql)){
        echo '<body style="background-color: #000000;">
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
         <form action="action_signup.php" method="post" style="margin-top: 10vh; width:32vw; border:none; font-family: orbitron; box-shadow: none;">
                <br>
                <h3 style="font-family: orbitron; text-shadow: 2px -1px 5px rgb(255, 255, 255);">Succesfull sign up</h3>
                <br>
        </form>
        <script>
            function bounce(){
                window.location.href = "login_section.php";
            }
            setTimeout(bounce, 1800);
        </script>';
    }else {
        echo 'Error: '.$dbConnect->error;
    }

}

// READ the created post
function viewCreatedPost($dbConnect){
    $sql="SELECT * FROM post";
    $result = mysqli_query($dbConnect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            echo '
                    <form action="update_section.php" method="post" class="form3" style="">
                        <br>
                        <div class="iconsContainer">
                        </div>
                       
                        <input  type="hidden" class="input3" name="postid" value="'.$row['id'].'" style="text-transform: uppercase;">
                        <input class="input3" name="location" value="'.$row['localizacion'].'" style="text-transform: capitalize;">
                        <input class="input3" name="date" value="'.$row['fecha'].'">
                        <input class="input3" name="time" value="'.$row['tiempo'].'">
                        <br>
                        <textarea class="textarea3" name="desc">'.$row['descripcion'].'</textarea>
                        <br>
                        <i style="position: absolute; margin-top: 3vh; margin-left: 10.3vw; font-size: 1.1em; color: rgba(210, 255, 6, 0.9);" class="fa fa-pencil"></i>
                        <input id="input4" type="submit" value="Edit">
                        <i style="position: absolute; margin-top: 1.38vh; margin-left: 9.25vw; font-size: 1.2em; color: rgba(255, 0, 0, 0.9);" class="fa fa-trash"></i>
                        <a id="aDelete" href="action_delete.php?id='.$row['id'].'"><p>Delete</p></a>
                        <br><br>  
                    </form>';
        }
    }
}

// UPDATE Post
function updatePost($dbConnect, $id, $location,$date,$time,$description) {
    // Corrected SQL query
    $sql = "UPDATE post SET localizacion='$location', fecha='$date', tiempo='$time', descripcion='$description'  WHERE id='$id'";
    
    if(mysqli_query($dbConnect, $sql)) {
        echo '<p style="color: red;">Location Updated</p>';
    } else {
        echo 'Error: ' . $dbConnect->error;
    }
}


// DELETE post 
# This is the function which gives the order to the database for deleting
// function deletePost($dbConnect, $id){
//     $sql = "SELECT * FROM post WHERE id = $id";
//     $result = mysqli_query($dbConnect,$sql);
//     if (mysqli_num_rows($result) > 0){
//         while($row = mysqli_fetch_assoc($result)) {
//             echo '<p><a href="action_delete.php?id='.$row['id'].'">[ Delete ]</a></p>';
//         }

//     }
// }

// DELETE post
# This is the function we call to give the order delete to the database
function delete($dbConnect, $id){
    $sql = "DELETE FROM post WHERE id = $id";
    if (mysqli_query($dbConnect,$sql)) {
        echo '<p style="color: red;">Post deleted</p>';
    } else {
        echo 'Error '.$sql.'<br>'.$$dbConnect->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UFO</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../images/favicon.ico">
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
<body>
    
</body>
</html>