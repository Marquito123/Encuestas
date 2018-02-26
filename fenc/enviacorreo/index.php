<?php  
session_start(); 
error_reporting(0);
$varsesion = $_SESSION['Usuario'];
$varsesion1 = $_SESSION['usu_nombre'];
$varsesion3 = $_SESSION['id_encuestas'];
$varsesion4 = $_SESSION['descripcion'];
$varsesion5 = $_SESSION['id_pregunta'];
$varsesion6 = $_SESSION['preg_texto'];
$varsesiont = $_SESSION['usu_correo'];

if ($varsesion == null || $varsesion = '' ) {
    if ($varsesionp == null || $varsesionp ='') {
        echo '<script type="text/javascript">';
        echo 'alert("Usted no tiene acceso")';
        echo "</script>";
        echo '<meta http-equiv="Refresh" content="0;URL=login/index.php">';
        die();
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de contacto</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
</head>
<body>

    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>INFORMACION<br>DE CONTACTO</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span></p>
                <p><span class="fa fa-mobile"></span></p>
            </section>
        </section>

        <form action="enviar.php" method="post" class="form_contact">
            <h2>Envia un mensaje</h2>
            <div class="user_info">
                <label for="names">Nombre(s)</label>
                <input type="text" id="names" name="nombre" value="<?php echo $_SESSION['usu_nombre'] ?>"" required>

                <label for="destinatario">Destino</label>
                <input type="text" id="destinatario" name="destinatario">

                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje" name="mensaje" required>Su encuesta vence el:</textarea>

                <input type="submit" value="Enviar Mensaje" id="btnSend">
            </div>
        </form>

    </section>

</body>
</html>
