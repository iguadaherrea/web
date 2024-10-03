<?php
include "codigo_registro.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scalae=1.0, minimum-scale=1.0">
       <link rel="stylesheet" href="stylelogin.css">
              <title>Registro-WomanFit</title>
</head>

<body>
    <!--container-all "CONTENERDOR DE TODO"-->
    <div class="container-all">

        <div class="container-form">
        <div class="capa"></div>
            <img src="logo.svg" alt="" class="logo">
            <h1 class="titulo">REGISTRATE</h1>

 <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST'>
               <label for="">Nombre de Usuario</label>
                <input type="text" name="usuario">
                <span class="msj_error"> <?php echo $usuario_error; ?> </span>
                <label for="">Email</label>
                <input type="text" name="email">
                <span class="msj_error"><?php echo $email_error; ?></span>
                <label for="">Contraseña</label>
                <input type="password" name="password">
                <span class="msj_error"><?php echo $password_error; ?></span>


                <input type="submit" value="Registrarme">
            </form>

            <!--es útil para aplicar estilos personalizados, 
        como cambiar el color o el tamaño de fuente,
         a un fragmento de texto. text-footer "Que va a final de la página" -->

            <span class="text-footer"> ¿Ya te has registrado?
               
            <a href="login.php">Inciar Sesión</a>
            </span>

        </div>
        <div class="container-img"></div>
    </div>

</body>

</html>