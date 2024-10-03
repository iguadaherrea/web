<?php 
//Iniciar la sesión//

session_start();

if(isset($_SESSION["loggedin"])&& $_SESSION["loggedin"]===true){
    header("location:insioDeSesion.php");
    exit;
}

require_once "conexion.php";

$email = $password = "" ;
$email_error = $password_error = "" ;


if($_SERVER["REQUEST_METHOD"]==="POST"){

   if(empty(trim($_POST["email"]))){

       $email_error = "Aqui ingresa tu e-mail";

   }else{
    $email=trim($_POST["email"]);
   }

   if(empty(trim($_POST["password"]))){

    $password_error = "Aqui ingresa tu clave";

}else{
 $password=trim($_POST["password"]);
}
   

//VALIDACIÓN USUARIO//
 if(empty($email_error) && empty ($password_error)){
  $sql= "SELECT id, usuario, email, clave FROM usuarios WHERE email = ?";

  if($stmt=mysqli_prepare($conexion, $sql)){

     mysqli_stmt_bind_param($stmt, "s", $param_email);

     $param_email= $email;

     if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);

     }

     if(mysqli_stmt_num_rows($stmt)===1){
          
        mysqli_stmt_bind_result($stmt, $id, $usuario, $email, $hashed_password);
        if(mysqli_stmt_fetch($stmt)){
            if(password_verify($password, $hashed_password)){

                session_start();


                //Almacenar los datos en variable de sesion//

                $_SESSION["loggedin"]=true;
                $_SESSION["id"]=$id;
                $_SESSION["email"]=$email;


                header("location: inisioDeSesion.php");
            }else{
               $password_error="La contraseña es incorrecta";
            }
        }else{
            $email_error="Este mail no está registrado";
        }
     }


  }


 }


  


mysqli_close($conexion);


}


?>