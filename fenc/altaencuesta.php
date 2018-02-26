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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$('#table').DataTable({
            "lengthMenu": [[3,], [3,]],   
            "order": [[1, "asc"]],
            "bLengthChange": false,
            "language":{
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrada de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search":"Buscar:", 
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
        table tr:not(:first-child):hover{background-color: #ddd;
         }
   
    </style>
    <!--STYLE FONDO JGJ-->
    <style type="text/css">
        body{background: #ffecb3;} 
        /*.dataTables_filter { 
            display: none; 
        }*/
      
    </style>

    <script type="text/javascript">
        function enviarForm(){
            document.formulario.submit();
        }
    </script>
    <script>
        $(document).on('change','input[type="checkbox"]' ,function(e) {
            if(this.id=="Regional") {
                if(this.checked) $('#regional').val(this.value);
                else $('#regional').val("0");
            }
        });
    </script>
    <script>
        $(document).on('change','input[type="checkbox"]' ,function(e) {
            if(this.id=="Distrital") {
                if(this.checked) $('#distrital').val(this.value);
                else $('#distrital').val("0");
            }
        });
    </script>
    <script>
        $(document).on('change','input[type="checkbox"]' ,function(e) {
            if(this.id=="Gerente") {
                if(this.checked) $('#gerente').val(this.value);
                else $('#gerente').val("0");
            }
        });
    </script>
    <script>
        $(document).on('change','input[type="checkbox"]' ,function(e) {
            if(this.id=="Estatus") {
                if(this.checked) $('#estatus').val(this.value);
                else $('#estatus').val("0");
            }
        });
    </script>
    <script>
        $(document).on('change','input[type="checkbox"]' ,function(e) {
            if(this.id=="Scroll") {
                if(this.checked) $('#scroll').val(this.value);
                else $('#scroll').val("0");
            }
        });
    </script>
</head>
<body>
	<!--empieza el navbar-->
	<!--<ul id="dropdown1" class="dropdown-content">
        <li><a href="inienc.php">Alta encuestas</a></li>
        <li><a href="inipre.php">Alta preguntas</a></li>
        <li><a href="inires.php">Alta respuestas</a></li>
        <li class="divider"></li>
        <li><a href="inicambiaecn.php">Cambiar encuesta</a></li>
        <li><a href="inicambiapre.php">Cambiar preguntas</a></li>
        <li><a href="inicambiares.php">Cambiar respuestas</a></li>
        <li><a href="inialtuni.php">Alta encuestas por unidad</a></li>
    </ul>-->


    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper #8d6e63 brown  darken-4">
                <h5 class="brand-logo center">Bienvenido: <?php echo $_SESSION['usu_nombre']  ?></h5>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">
                    <!--Opciones<i class="material-icons right">arrow_drop_down</i></a></li>-->
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
            $Scroll=$_POST['Scroll'];

    	    $_SESSION['descripcion']=$descripcion;
    	    $_SESSION['id_encuestas']=$id_encuestas;


    	    $insertar=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
    	    $res=$client->Alta_Encuestas($_POST);
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
                    echo '<meta http-equiv="Refresh" content="0;URL=inienc.php">';
                    echo "$userLogin->codigo";    
                }else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Registro incorrecto:")';
                    echo "</script>";
                    echo '<meta http-equiv="Refresh" content="0;URL=inienc.php">';

                }
            }
    $_SESSION['id_encuestas']=$obj->id_encuestas;
    ?>
    <!--codigo con el cual cambiamos encuestas-->
    <?php  
        $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
        if (isset($_POST['insertar6'])) {
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
            $Scroll=$_POST['Scroll'];

            


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
                    echo '<meta http-equiv="Refresh" content="0;URL=inienc.php">';
                    echo "$userLogin->codigo";    
                }else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Registro incorrecto:")';
                    echo "</script>";
                    echo '<meta http-equiv="Refresh" content="0;URL=inienc.php">';

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
            //echo $obj->usu_nombre;

        }
    
        $_SESSION['id_encuestas']=$obj->id_encuestas;
        $_SESSION['enc_fecha_fin']=$obj->enc_fecha_fin;
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
                        <th width="10%" style="">Id</th>
                        <th width="35%" align="left">Nombre</th>
                        <th width="10%">Fecha Inicio</th>
                        <th width="10%">Fecha Fin</th>
                        <th width="10%" style="display: none;">Regional</th>
                        <th width="10%" style="display: none;">Distrital</th>
                        <th width="10%" style="display: none;">Gerente</th>
                        <th width="10%" style="display: none;">Min opereacion</th>
                        <th width="10%" style="display: none;">Min produccion</th>
                        <th width="10%">Status</th>
                        <th width="10%" style="">Scroll</th>
                    </tr>
                </thead>
                <!--con esta parte llenamos la tabla-->
                <tbody>
                    <?php foreach ($array as $row): ?>
                        <tr>
                            <td height="1%" style=""><?php echo $row->id_encuestas;  ?></td>
                            <td height="1%"><?php echo $row->enc_descripcion;  ?></td>
                            <td height="1%"><?php echo $row->enc_fecha_inicio; ?></td>
                            <td height="1%"><?php echo $row->enc_fecha_fin;  ?></td>
                            <td height="1%" style="display: none;"><?php echo $row->Min_operacion;  ?></td>
                            <td height="1%" style="display: none;"><?php echo $row->Min_produccion;  ?></td>
                            <td height="1%" style="display: none;"><?php echo $row->Regional;  ?></td>
                            <td height="1%" style="display: none;"><?php echo $row->Distrital;  ?></td>
                            <td height="1%" style="display: none;"><?php echo $row->Gerente;  ?></td>
                            <td height="1%"><?php echo $row->Enc_estatus; ?></td>
                            <td height="1%" style=""><?php echo $row->Scroll; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container ">
    	<div id="activa" class="section scrollspy">
    		<form method="post" class="col s12">
                <div class="row">  
                    <div class="input-field col s3">
                        Encuesta:<input type="text" name="descripcion" id="descripcion" placeholder="Nombre de encuesta">
                    </div>
                    <div class="input-field col s2">
                        Inicio:<input type="date" name="fecha_inicio" id="fecha_inicio" step="1" min="2018-01-01" max="" placeholder="vig. Inicio">
                    </div>
                    <div class="input-field col s2">
                        Fin:<input type="date" name="fecha_fin" id="fecha_fin" step="1" min="2018-01-01" placeholder="vig. fin">
                    </div>
                    <div class="input-field col s2">
                        Minimo Operación<input type="text" name="Min_operacion" id="Min_operacion" placeholder="Puntaje minimo">
                    </div>
                    <div class="input-field col s2">
                        Minimo Producción<input type="text" name="Min_produccion" id="Min_produccion" placeholder="Puntaje minimo" checked="true">
                    </div>
                    <div class="input col s2">
                        <br>
                        Regional:<!--<input name="group1" type="radio" id="test1" value="1" />
                        <label for="test1">Participa</label>
                        <input name="group1" value="0" type="radio" id="test2" />
                        <label for="test2">No participa</label>-->
                        <p><input  type="checkbox" value="1" name="Regional" id="Regional">
                        <label for="Regional">Participa</label></p>

                        <!--<input type="text" name="Regional" id="Regional" list="regional" placeholder="Regional">-->
                    </div>
                    <div class="input col s2">
                        <br>
                        Distrital:<!--<br><input name="group2" type="radio" id="test3" value="1" />
                        <label for="test3">Participa</label>
                        <input name="group2" value="0" type="radio" id="test4" />
                        <label for="test4">No participa</label>-->
                        <!--<input type="text" name="Regional" id="Regional" list="regional" placeholder="Regional">-->
                        <p><input  type="checkbox" value="1" name="Distrital" id="Distrital">
                        <label for="Distrital">Participa</label></p>
                    </div>
                    <!--<div class="input-field col s2">
                        <select name="Regional" id="Regional">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>-->
                    <div class="input col s2">
                        <br>
                        Gerente:<!--<br><input name="group3" type="radio" id="test5" value="1" />
                        <label for="test5">Participa</label>
                        <input name="group3" value="0" type="radio" id="test6" />
                        <label for="test6">No participa</label>-->
                        <!--Distrital<input type="text" name="Distrital" id="Distrital" list="distrital" placeholder="Distrital">-->
                        <p><input  type="checkbox" value="1" name="Gerente" id="Gerente">
                        <label for="Gerente">Participa</label></p>
                    </div>
                    <div class="input col s2">
                        <br>
                        Estatus:
                        <p><input  type="checkbox" value="1" name="Estatus" id="Estatus">
                        <label for="Estatus">Activo</label></p>
                    </div>
                    <div class="input col s2">
                        <br>
                        Modalidad Scroll:
                        <p><input  type="checkbox" value="1" name="Scroll" id="Scroll">
                        <label for="Scroll">Activo</label></p>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" hidden="true" name="Regional" class="form-control" id="regional" value="0">
                    </div>
                    <div class="input-field col s2">
                        <input type="text" hidden="true" name="Distrital" class="form-control" id="distrital" value="0">
                    </div>
                    <div class="input-field col s2">
                        <input type="text" hidden="true" name="Gerente" class="form-control" id="gerente" value="0">
                    </div>
                    <div class="input-field col s2">
                        <input type="text" hidden="true" name="Estatus" class="form-control" id="estatus" value="0">
                    </div>
                    <div class="input-field col s2">
                        <input type="text" hidden="true" name="Scroll" class="form-control" id="scroll" value="0">
                    </div>
                    <div class="input-field col s2">
                        <input type="text" hidden="true" name="id_usuario" id="id_usuario" placeholder="Id usuario" value="<?php echo $_SESSION['Usuario']  ?>">
                    </div>
                    <div class="input-field col s1">
                        <input type="text" hidden="true" name="id_encuesta" id="id_encuestas" placeholder="Id encuesta">
                    </div>
                    <div class="input-field col s2">
                        <button class="waves-effect waves-light btn orange darken-3" name="insertar8" type="submit">Registrar</button> 
                        <!--<a class="waves-effect waves-light btn" name="insertar8">button</a> -->   
                    </div>
                    <div class="input-field col s2">
                        <button class="waves-effect waves-light btn orange darken-3" name="insertar6" type="submit">Cambiar</button>         
                    </div>
                </div>
            </form>
    	</div>
    </div>
<!--<new button JGJ-->
     <div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large orange darken-3">
      <i class="large material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red" href="inienc.php"><i class="material-icons" title="Alta encuestas">check</i></a></li>
      <li><a class="btn-floating yellow darken-1" href="inipre.php"><i class="material-icons" title="Alta preguntas">check</i></a></li>
      <li><a class="btn-floating green" href="inires.php"><i class="material-icons" title="Alta respuestas">check</i></a></li>
      <li><a class="btn-floating brown" href="iniencpreg.php"><i class="material-icons" title="Agregar preguntas">check</i></a></li>
      <li><a class="btn-floating Red" href="inialtuni.php"><i class="material-icons" title="Alta de encuestas por unidad">cloud_done</i></a></li>
    </ul>
  </div>

    <datalist id="regional">
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </datalist>

     <datalist id="distrital">
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </datalist>

    <datalist id="gerente">
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </datalist>

    <datalist id="estatus">s
        <option value="1">Vigente</option>
        <option value="0">No vigente</option>
    </datalist>

    <datalist id="scroll">
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </datalist>

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
                         //rIndex = this.rowIndex;
                         document.getElementById("id_encuestas").value = this.cells[0].innerHTML;
                         document.getElementById("descripcion").value = this.cells[1].innerHTML;
                         document.getElementById("fecha_inicio").value = this.cells[2].innerHTML;
                         document.getElementById("fecha_fin").value = this.cells[3].innerHTML;
                         document.getElementById("Min_operacion").value = this.cells[4].innerHTML;
                         document.getElementById("Min_produccion").value = this.cells[5].innerHTML;
                         //document.getElementById("Estatus").value = this.cells[6].innerHTML;
                         document.getElementById("Regional").checked = this.cells[7].innerHTML;
                         document.getElementById("Distrital").checked = this.cells[8].innerHTML;
                         document.getElementById("Gerente").checked = this.cells[9].innerHTML;
                         document.getElementById("Estatus").checked = this.cells[10].innerHTML;
                         document.getElementById("Scroll").checked = this.cells[11].innerHTML;

                    };
                }
    </script>
    <script type="text/javascript">
		$(".button-collapse").sideNav();
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.modal').modal();
           // $('#modal2').modal('open');
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