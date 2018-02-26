<?php  
  $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
  if (isset($_POST['insertar'])) {
  	$id_encuestas=$_POST['id_encuestas'];
  	$Status_encuesta=$_POST['Status_encuesta'];

  	$insertarUno=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
    
    $_res=$client->Activa_Encuestas($_POST);
    var_dump($res);
  }
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Activa Preguntas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="page-container">
            <h1>Panel para activar preguntas</h1>
            <form action="" method="post">
                <input type="text" name="id_encuestas" class="username" placeholder="id_encuestas">
                <input type="text" name="Status_encuesta" class="password" placeholder="Status_encuesta">
                <button name="insertar" type="submit">Activar</button>
                <div class="error"><span>+</span></div>
            </form>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>

