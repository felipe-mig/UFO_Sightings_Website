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

 
 $id = $_GET['id'];


 delete($dbConnect, $id);
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="bounce()">
<script>
        function bounce(){
            window.location.href="dashboard_section.php";
        }
    </script>
</body>
</html>