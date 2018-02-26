<?php  
session_start();
error_reporting(0);
$varsesion = $_SESSION['Usuario'];
$_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
        if  (isset($_POST['insertar0'])) {
            $id_usuario=$_POST['id_usuario'];
        
            $insertarUno=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
            $res=$client->Cat_Respuestas($_POST);
                //var_dump($res);
        }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script>
    $(document).ready(function() {
      $("#submit").click();
  });
</script>
</head>
<body>
<form method="post" id="myform" action="altarespuesta.php" class="col s12">
        <div class="input-field col s2">
                <input id="icon_prefix" name="id_usuario" type="text" class="validate center" value="<?php echo $_SESSION['Usuario']  ?>">
                <label for="icon_prefix">Id usuario</label>
            </div>
        <button name="insertar0" type="submit" class="center" id="submit">Consultar</button>
    </form>
</body>
</html>