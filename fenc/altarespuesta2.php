<?php 
session_start(); 
error_reporting(0);
$varsesion = $_SESSION['Usuario'];
$varsesion1 = $_SESSION['usu_nombre'];
$varsesion3 = $_SESSION['id_encuestas'];
$varsesion4 = $_SESSION['descripcion'];
$varsesion5 = $_SESSION['id_pregunta'];
$varsesion6 = $_SESSION['preg_texto'];

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
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
         $('#table').DataTable({
            "lengthMenu": [[3,], [3,]],   
            "order": [[1, "asc"]],
            "language":{
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrada de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search": "Buscar:",
                "zeroRecords":    "No se encontraron registros coincidentes",
                "paginate": {
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },                  
            }

        });
     });
    </script>
	<title>Alta respuesta</title>
	<meta charset="utf-8">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <style type="text/css">
        table tr:not(:first-child){
                cursor: pointer;transition: all .25s ease-in-out;
            }
        table tr:not(:first-child):hover{background-color: #ddd;}
    </style>

    <script type="text/javascript">
        function enviarForm(){
            document.formulario.submit();
        }
    </script>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                    .attr('src', e.target.result)
                    .width(50)
                    .height(50);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>
<body>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="inienc.php">Alta encuestas</a></li>
        <li><a href="inipre.php">Alta preguntas</a></li>
        <li><a href="inires.php">Alta respuestas</a></li>
        <li class="divider"></li>
        <li><a href="inicambiaecn.php">Cambiar encuesta</a></li>
        <li><a href="inicambiapre.php">Cambiar preguntas</a></li>
        <li><a href="inicambiares.php">Cambiar respuestas</a></li>
        <li><a href="inialtuni.php">Alta encuestas por unidad</a></li>
    </ul>


    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper #b71c1c red darken-4">
                <h6 class="brand-logo center">Bienvenido: <?php echo $_SESSION['usu_nombre']  ?></h6>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Opciones<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <ul>
                    <li><a href="login/logout.php">Salir</a></li>
                </ul>
            </div>
        </nav>     
    </div>

    <?php  
    $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
        if (isset($_POST['insertar3'])) {
            $id_respuesta=$_POST['id_pregunta'];
            $resp_texto=$_POST['resp_texto'];
            $resp_imagen=$_POST['resp_imagen'];
            $resp_orden=$_POST['resp_orden'];
            $valor_prod=$_POST['valor_prod'];
            $valor_oper=$_POST['valor_oper'];
            $id_usuario=$_POST['id_usuario'];
            $Estatus=$_POST['Estatus'];

            $insertarUno=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
            $res=$client->Alta_Respuestas($_POST);
            //var_dump($res);
        }

        foreach ($res as $obj) {
            $json = (string)$obj;
        } 

        //echo($json)
        $userLogin = json_decode($json);
            foreach($userLogin as $obj){ 
                echo $obj->id_encuestas;
                //echo $obj->usu_nombre;

            if ($obj->codigo == OK ){      
                echo '<script type="text/javascript">';
                echo 'alert("Registro exitoso")';
                echo "</script>";
                echo '<meta http-equiv="Refresh" content="0;URL=inires.php">';
                echo "$userLogin->codigo";    
            }else{
                echo '<script type="text/javascript">';
                echo 'alert("Registro incorrecto:")';
                echo "</script>";
                echo '<meta http-equiv="Refresh" content="0;URL=inires.php">';
            }
        }  
    ?>

    <?php  
    $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
        if (isset($_POST['insertar4'])) {
            $id_pregunta=$_POST['id_pregunta'];
            $id_respuesta=$_POST['id_respuesta'];
            $resp_texto=$_POST['resp_texto'];
            $resp_imagen=$_POST['resp_imagen'];
            $resp_orden=$_POST['resp_orden'];
            $valor_prod=$_POST['valor_prod'];
            $valor_oper=$_POST['valor_oper'];
            $id_usuario=$_POST['id_usuario'];
            $Estatus=$_POST['Estatus'];

            $insertarUno=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
            $res=$client->Cambia_Respuestas($_POST);
            //var_dump($res);
        }

        foreach ($res as $obj) {
            $json = (string)$obj;
        } 

        //echo($json)
        $userLogin = json_decode($json);
            foreach($userLogin as $obj){ 
                echo $obj->id_encuestas;
                //echo $obj->usu_nombre;

            if ($obj->codigo == OK ){      
                echo '<script type="text/javascript">';
                echo 'alert("Registro exitoso")';
                echo "</script>";
                echo '<meta http-equiv="Refresh" content="0;URL=inires.php">';
                echo "$userLogin->codigo";    
            }else{
                echo '<script type="text/javascript">';
                echo 'alert("Registro incorrecto:")';
                echo "</script>";
                echo '<meta http-equiv="Refresh" content="0;URL=inires.php">';
            }
        }  
    ?>

    <?php
        $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
            if  (isset($_POST['insertar0'])) {
                $id_usuario=$_POST['id_usuario'];
        
                $insertarUno=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
                $res=$client->Cat_Respuestas($_POST);
                //var_dump($res);
            }
            foreach ($res as $obj) {
                $json = (string)$obj;
            } 

            $array = json_decode($json);

            foreach($array as $obj){
            }
    ?>

    <div class="container">
    	<div id="consulta" class="section scrollspy">
    		<table id="table" border="1" class="striped centered">
                <thead>
                    <tr>
                        <th>Id Pregunta</th>
                        <th>Respuesta</th>
                        <th>Texto</th>
                        <th>Imagen</th>
                        <th>Orden</th>
                        <th>Valor de Producción</th>
                        <th>Valor de Operación</th>
                        <th>Estatus</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($array as $row): ?>
                        <tr>
                            <td height="1%"><?php echo $row->id_pregunta;  ?></td>
                            <td height="1%"><?php echo $row->id_respuesta;  ?></td>
                            <td height="1%"><?php echo $row->resp_texto;  ?></td>
                            <td height="1%"><?php echo $row->resp_imagen;  ?></td>
                            <td height="1%"><?php echo $row->resp_orden;  ?></td>
                            <td height="1%"><?php echo $row->valor_prod;  ?></td>
                            <td height="1%"><?php echo $row->valor_oper;  ?></td>
                            <td height="1%"><?php echo $row->resp_estatus;  ?></td>
                            <td height="1%"><?php echo $row->id_usuario;  ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    	</div>
    </div>

    <div class="container">
    	<div class="row">
    		<div id="activa" class="section scrollspy">
    			<form method="post" class="col s12" id="form1">
    				<h6 class="center"><?php echo $_SESSION['preg_texto'] ?></h6>
    				<div class="input-field col s2">
    					Id Pregunta:<input type="text" name="id_pregunta" id="id_pregunta" placeholder="Id pregunta" value="<?php echo $_SESSION['id_pregunta'] ?>">
    				</div>
                    <div class="input-field col s2">
                        Id Respuesta:<input type="text" name="id_respuesta" id="id_respuesta" placeholder="Id respuesta" value="<?php echo $_SESSION['id_respuesta'] ?>">
                    </div>
    				<div class="input-field col s6">
    					Respuesta<input type="text" name="resp_texto" id="resp_texto" placeholder="Respuesta texto" value="">
    				</div>
    				<div class="input-field col s2">
    					Imagen:<a class=" modal-trigger" href="#modal1"><input value="" id="resp_imagen" placeholder="imagen" ></a>
    				</div>
    				<div class="input-field col s2">
    					Orden:<input type="text" name="resp_orden" id="resp_orden" placeholder="Orden">
    				</div>
    				<div class="input-field col s2">
    					Minimo<input value="" name="valor_prod" id="valor_prod" placeholder="Valor. produccion" >
    				</div>
                    <div class="input-field col s2">
                        Minimo<input value=" " name="valor_oper" id="valor_oper" placeholder="Valor de operacion" >
                    </div>
                    <div class="input-field col s2">
                        Estatus<input type="text" name="Estatus" id="resp_estatus" placeholder="Estatus" list="Estatus">
                    </div>
                    </div>
                    <div class="col s2">
                        <button name="insertar3" type="submit">Insertar</button>
                    </div>
                    <div class="col s2">
                       <button name="insertar4" type="submit">Actualizar</button>    
                    </div>
                    <div class="col s2">
                        <a href="inienc.php" <onclick="myfunction()" value="ResetForm">Limpiar</a>
                    </div>
                    <div class="col s2">
                        <img id="blah" src="#" alt="your image" align="center" width="50" height="50">
                    </div>
    				<!--<div class="input-field col s3">
    					<select name="Estatus" id="valor_prod">
    						<option value="" disabled selected>Elige</option>
    						<option value="1">Vigente</option>
    						<option value="0">No vigente</option>
    					</select>
    				</div>-->
    				<div class="input-field col s12">
    					<?php
    					if(isset($_POST["submit"])) {
    						$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    						if($check !== false) {
    							$data = base64_encode(file_get_contents( $_FILES["fileToUpload"]["tmp_name"] ));
    							echo "<textarea id='data' style='display:none' name='resp_imagen'>".$data."</textarea>";
                                echo "Imagen insertada correctamente";
    						} else {
    							echo "File is not an image.";
    						}
    					}
    					?>
    			</form>
    		</div>
    	</div>
    </div>

    <div id="modal1" class="modal">
    	<div class="modal-content">
    		<form action="altarespuesta.php" method="post" enctype="multipart/form-data">
    			<div class="container">
                    <div class="col s12">
                        <img id="blah" src="#" alt="your image" align="center">
                    </div>
                </div>

    			Selecciona la imagen:
    			<input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);"><br>
    			<input type="submit" value="Coloca tu imagen" name="submit">
    		</form>
    	</div>
    </div>
    
    <datalist id="estatus">
        <option value="1">Vigente</option>
        <option value="0">No vigente</option>
    </datalist>

    <div id="modal2" class="modal">
    	<div class="modal-content">
    		<form method="post" id="myform" class="col s12">
    			<div class="row">
    				<div class="input-field col s6">
    					<input id="icon_prefix" name="id_usuario" type="text" class="validate center" value="<?php echo $_SESSION['Usuario'] ?>">
    					<label for="icon_prefix">Id usuario</label>
    				</div>
    				<button name="insertar0" type="submit" class="center">Cerrar</button>
    			</div>
    		</form>
    	</div>
    	<div class="modal-footer">
    		<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    	</div>
    </div>

    <script>
        function myFunction() {
            document.getElementById("form1").reset();
        }
    </script>

    <script>
        var table = document.getElementById('table');

        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
             document.getElementById("id_pregunta").value = this.cells[0].innerHTML;
                         //rIndex = this.rowIndex;
                         document.getElementById("id_respuesta").value = this.cells[1].innerHTML;
                         document.getElementById("resp_texto").value = this.cells[2].innerHTML;
                         document.getElementById("resp_imagen").value = this.cells[3].innerHTML;
                         document.getElementById("resp_orden").value = this.cells[4].innerHTML;
                         document.getElementById("valor_prod").value = this.cells[5].innerHTML;
                         document.getElementById("valor_oper").value = this.cells[6].innerHTML;
                         document.getElementById("resp_estatus").value = this.cells[7].innerHTML;
                         //document.getElementById("id_usuario").value = this.cells[7].innerHTML;
                         

                     };
                 }
     </script> 



    <script type="text/javascript">
		$(".button-collapse").sideNav();
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.modal').modal();
            //$('#modal2').modal('open');
            //$('#modal2').modal('close');
		});
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        /*$('.modal').modal();
        $('#modal2').modal('open');
        $('#modal1').modal('close');*/
	</script>
	<!--script pop-up-->
	<script type="text/javascript">
		$(document).ready(function(){
			$('.collapsible').collapsible();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.scrollspy').scrollSpy();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('select').material_select();
		});
	</script>
</body>
</html>