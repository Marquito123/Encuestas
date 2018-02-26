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
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$('#table').DataTable({
            "lengthMenu": [[4,], [4,]],   
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
	<title>Registro de encuestas</title>
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
</head>
<body>
	<!--empieza el navbar-->
	<ul id="dropdown1" class="dropdown-content">
        <li><a href="inienc.php">Alta encuestas</a></li>
        <li><a href="inipre.php">Alta preguntas</a></li>
        <li><a href="inires.php">Alta respuestas</a></li>
        <li class="divider"></li>
        <li><a href="inicambiaecn.php">Cambiar encuesta</a></li>
        <li><a href="inicambiapre.php">Cambiar preguntas</a></li>
        <li><a href="inicambiares.php">Activa respuestas</a></li>
        <li><a href="inialtuni.php">Alta encuestas por unidad</a></li>

    </ul>


    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper #b71c1c red darken-4">
                <h5 class="brand-logo center">Bienvenido: <?php echo $_SESSION['usu_nombre']  ?></h5>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Opciones<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <ul>
                    <li><a href="login/logout.php">Salir</a></li>
                </ul>
            </div>
        </nav>     
    </div>
    <!--termina nav-->
    <!--empieza codigo php que inserta datos al ws altaencuestas-->
    <?php  
        $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
        if (isset($_POST['insertar8'])) {
            $id_encuesta=$_POST['id_encuesta'];
    	    $descripcion=$_POST['descripcion'];
    	    $fecha_inicio=$_POST['fecha_inicio'];
    	    $fecha_fin=$_POST['fecha_fin'];
    	    $id_usuario=$_POST['id_usuario'];
    	    $Regional=$_POST['Regional'];
    	    $Distrital=$_POST['Distrital'];
    	    $Gerente=$_POST['Gerente'];
    	    $Min_operacion=$_POST['Min_operacion'];
    	    $Min_produccion=$_POST['Min_produccion'];
    	    $Estatus=$_POST['Estatus'];

    	    


    	    $insertar=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
    	    $res=$client->Cambia_Encuestas($_POST);
    	    //var_dump($res);  
        }


        foreach ($res as $obj) {
            $json = (string)$obj;
        } 

        //echo($json)
        $userLogin = json_decode($json);
            foreach($userLogin as $obj){ 
                echo $obj->id_encuestas;
                echo $obj->usu_nombre;

                if ($obj->codigo == OK ){      
                    echo '<script type="text/javascript">';
                    echo 'alert("Registro exitoso")';
                    echo "</script>";
                    echo '<meta http-equiv="Refresh" content="0;URL=inicambiaecn.php">';
                    echo "$userLogin->codigo";    
                }else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Registro incorrecto:")';
                    echo "</script>";
                    echo '<meta http-equiv="Refresh" content="0;URL=inicambiaecn.php">';

                }
            }
    $_SESSION['id_encuestas']=$obj->id_encuestas;
    ?>
    <!--codigo con el cual consumimos catalog encuesta y con for each nos muestra un dato en especifico-->
    <?php  
        $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
        if  (isset($_POST['insertar0'])) {
    	    $id_usuario=$_POST['id_usuario'];


    	    $insertarUno=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
    	    $res=$client->Cat_Encuestas($_POST);
    	//var_dump($res);
        }

        foreach ($res as $obj) {
            $json = (string)$obj;
        } 
         
        //echo($json)
        $userLogin = json_decode($json);
        foreach($userLogin as $obj){ 
        //echo $obj->id_encuestas;

        }
    
        $_SESSION['id_encuestas']=$obj->id_encuestas;
                            //con esta linea hacemos que la tabla se llene obtemiendo los datos del ws
        foreach ($res as $obj) {
    	    $json = (string)$obj;
        } 

        $array = json_decode($json);

        foreach($array as $obj){
        } 
    ?>
    <!--terina codigo php-->
    <div class="container">
    	<div id="consulta" class="section scrollspy">
    		<table id="table" border="1" class="striped centered">
    			<thead>
    				<tr>
    					<th width="10%">Id encuesta</th>
    					<th width="35%" align="left">Descripcion</th>
    					<th width="10%">Fecha Inicio</th>
    					<th width="10%">Fecha Fin</th>
    					<th width="10%">Min opereacion</th>
    					<th width="10%">Min produccion</th>
    					<th width="10%">Status</th>
    				</tr>
    			</thead>
    			<!--con esta parte llenamos la tabla-->
    			<tbody>
    				<?php foreach ($array as $row): ?>
    					<tr>
    						<td height="1%"><?php echo $row->id_encuestas;  ?></td>
    						<td height="1%"><?php echo $row->enc_descripcion;  ?></td>
    						<td height="1%"><?php echo $row->enc_fecha_inicio; ?></td>
    						<td height="1%"><?php echo $row->enc_fecha_fin;  ?></td>
    						<td height="1%"><?php echo $row->Min_operacion;  ?></td>
    						<td height="1%"><?php echo $row->Min_produccion;  ?></td>
    						<td height="1%"><?php echo $row->Enc_estatus;  ?></td>
    					</tr>
    				<?php endforeach; ?>
    			</tbody>
    		</table>
    	</div>
    </div>
    <div class="container">
    	<div id="activa" class="section scrollspy">
    		<form method="post" class="col s12">
    			<div class="row">
    				<div class="input-field col s4">
    					Descripción:<input type="text" name="descripcion" id="descripcion" placeholder="Descripcion">
    				</div>
                    <div class="input-field col s4">
                        Id Encuesta:<input type="text" name="id_encuesta" id="id_encuestas" placeholder="Descripcion">
                    </div>
    				<div class="input-field col s2">
    					Fecha Inicio:<input type="date" name="fecha_inicio" id="fecha_inicio" step="1" min="2018-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>">
    				</div>
    				<div class="input-field col s2">
    					Fecha Fin:<input type="date" name="fecha_fin" id="fecha_fin" step="1" min="2018-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>">
    				</div>
    				<div class="input-field col s4">
    					Usuario:<input type="text" name="id_usuario" id="id_usuario" placeholder="Id usuario" value="<?php echo $_SESSION['Usuario']  ?>">
    				</div>
    				<div class="input-field col s2">
    					Regional:<select name="Regional" id="Regional">
    						<option value="" disabled selected>Regional</option>
    						<option value="1">Participa</option>
    						<option value="0">No participa</option>
    					</select>
    				</div>
    				<div class="input-field col s2">
    					Distrital:<select name="Distrital" id="Distrital">
    						<option value="" disabled selected>Distrital</option>
    						<option value="1">Participa</option>
    						<option value="0">No participa</option>
    					</select>
    				</div>
    				<div class="input-field col s2">
    					Gerente:<select name="Gerente" id="Gerente">
    						<option value="" disabled selected>Gerente</option>
    						<option value="1">Participa</option>
    						<option value="0">No participa</option>
    					</select>
    				</div>
    				<div class="input-field col s2">
    					Min operacion:<select name="Min_operacion" id="Min_operacion">
    						<option value="" disabled selected>Elige</option>
    						<option value="0">0</option>
    						<option value="50">50</option>
    					</select>
    				</div>
    				<div class="input-field col s2">
    					Minimo prod:<select name="Min_produccion" id="Min_produccion">
    						<option value="" disabled selected>Elige</option>
    						<option value="60">60</option>
    						<option value="100">100</option>
    					</select>
    				</div>
                    <div class="input-field col s2">
                        Estatus:<select name="Estatus" id="Estatus">
                            <option value="" disabled selected>Elige</option>
                            <option value="1">Vigente</option>
                            <option value="0">No vigente</option>
                        </select>
                    </div>
    			</div>
    			<button name="insertar8" type="submit">Registrar</button>
    		</form>
    	</div>
    </div>

    <!--ventana que hace la consulta-->
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
    <!--scripts de pag web-->

    <script>
        var table = document.getElementById('table');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         document.getElementById("id_encuestas").value = this.cells[0].innerHTML;
                         //rIndex = this.rowIndex;
                         document.getElementById("descripcion").value = this.cells[1].innerHTML;
                         document.getElementById("fecha_inicio").value = this.cells[2].innerHTML;
                         document.getElementById("fecha_fin").value = this.cells[3].innerHTML;
                         document.getElementById("Regional").value = this.cells[4].innerHTML;
                         document.getElementById("Distrital").value = this.cells[5].innerHTML;
                         document.getElementById("Gerente").value = this.cells[6].innerHTML;
                         document.getElementById("Min_operacion").value = this.cells[7].innerHTML;
                         document.getElementById("Min_produccion").value = this.cells[7].innerHTML;

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