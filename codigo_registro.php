<?php

//Incluir archivo de conexión a la abase de datos//
require_once "conexion.php";


//Definir variables e inicializar con valores  vacios//

$usuario = $email = $password = "";

//Encargadas de mostrar el mensaje de error//
$usuario_error=$email_error=$password_error="";


if($_SERVER["REQUEST_METHOD"]=="POST"){

    //VALIDAR INPUT USUARIO//

    if(empty(trim($_POST["usuario"]))){

        $usuario_error="Debes ingresar un nombre de usuario";
    }else {
        $sql="SELECT id FROM usuarios WHERE usuario = ?";
        if($stmt=mysqli_prepare($conexion,$sql)){
            mysqli_stmt_bind_param($stmt,"s", $param_usuario);

            $param_usuario=trim($_POST["usuario"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);


                if(mysqli_stmt_num_rows($stmt)===1){
                    $usuario_error="Este nombre se usuario ya se encuentra registrado";
            }else {
                $usuario=trim($_POST["usuario"]);

            }
    }
        
    }
    
}   

//VALIDAR EMAIL//

if(empty(trim($_POST["email"]))){

    $email_error="Debes ingresar un e-mail";
}else {
    $sql="SELECT id FROM usuarios WHERE email = ?";
    if($stmt=mysqli_prepare($conexion,$sql)){
        mysqli_stmt_bind_param($stmt,"s", $param_email);

        $param_email=trim($_POST["email"]);

        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);


            if(mysqli_stmt_num_rows($stmt)===1){
                $email_error="Este nombre se e-mail ya se encuentra registrado";
        }else {
            $email=trim($_POST["email"]);

        }
    
}
    
}

}   

//VALIDANDO CONTRASEÑA//
if(empty(trim($_POST["password"]))){

    $password_error="Debes ingresar una contraseña";

}elseif(strlen(trim($_POST["password"]))<4){

    $password_error= "La contraseña debe tener al menos 4 caracteres";

} else{
    $password=trim($_POST["password"]);
}


//Que las variables error esten limpias antes de insertar datos//

if(empty($usuario_error)&& empty($email_error)&& empty($password_error)){
    
    $sql="INSERT INTO usuarios (usuario, email, clave) VALUES (?, ?, ?)";
    
    if($stmt=mysqli_prepare($conexion,$sql)) {
       
       mysqli_stmt_bind_param($stmt,"sss", $param_usuario, $param_email, $param_password);
    }

    //Establecer parametros para almacenar en la base de datos//
    $param_usuario=$usuario;
    $param_email=$email;
    $param_password=password_hash($password,PASSWORD_DEFAULT); //Contraseña encriptada//

    if(mysqli_stmt_execute($stmt)){
        header("location:login.php");
    }else{
        echo "Algo salio mal,intentalo despues";
    }


}
mysqli_close($conexion);  
}
?>   