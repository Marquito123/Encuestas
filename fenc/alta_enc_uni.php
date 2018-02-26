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

	<title>Alta de encuestas por unidad</title>
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
<!--STYLE FONDO JGJ-->
    <style type="text/css">
        body{background: #ffecb3;} 
    </style>

<script type="text/javascript">
    function enviarForm(){
        document.formulario.submit();
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
            <div class="nav-wrapper #8d6e63 brown darken-4">
                <h6 class="brand-logo center">Bienvenido: <?php echo $_SESSION['usu_nombre']?></h6>
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
    <?php
    $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
    if (isset($_POST['insertar3'])) {
        $id_encuesta=$_POST['id_encuesta'];
        $id_marca=$_POST['id_marca'];
        $id_local=$_POST['id_local'];
        $id_usuario=$_POST['id_usuario'];
        $insertarUno=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));

        $_res=$client->Alta_Encuesta_Unidad($_POST);
        var_dump($res);
               /* echo '<script type="text/javascript">';
                echo 'alert("Encuesta activada/desactivada con exito")';
                echo "</script>";
                echo '<meta http-equiv="Refresh" content="0;URL=inialtuni.php">';*/
        }
    ?>


            <?php
            $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
            if  (isset($_POST['insertar0'])) {
                $id_usuario=$_POST['id_usuario'];

                $insertarUno=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
                $res=$client->Cat_Encuestas($_POST);
                //var_dump($res);
            }
                            //con esta linea hacemos que la tabla se llene obtemiendo los datos del ws
            foreach ($res as $obj) {
               $json = (string)$obj;
           } 

           $array = json_decode($json);

           foreach($array as $obj){
           }  
           ?>
           <div class="container">
            <div class="row">
                <div id="consulta" class="section scrollspy">
                    <table id="table" border="1" class="striped centered">
                        <thead>
                            <tr>
                                <th width="10%">Id encuesta</th>
                                <th width="35%">Descripcion</th>
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
        </div>
        <div id="cambia" class="section scrollspy">
            <div class="container">
            	<?php
                $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";

                $client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
                $res=$client->Cat_Local($_POST);
                        //con esta linea hacemos que la tabla se llene obtemiendo los datos del ws
                foreach ($res as $obj) {
                    $json = (string)$obj;
                } 

                $array = json_decode($json);

                foreach($array as $obj){
                }  
                ?>


                <div class="row">
                    <form method="post" class="col s12">
                        <div class="input-field col s3">
                            Id encuesta:<input type="text" name="id_encuesta" id="id_encuestas" placeholder="Id encuesta" value="<?php echo $_SESSION['id_encuestas'] ?>">
                        </div>
                        <div class="input-field col s3">
                            Id marca:<select name="id_marca">
                                <option value="" disabled selected>Elige</option>
                                <option value="1">TOKS</option>
                                <option value="2">O.A.G.</option>
                                <!--<option value="3"></option>-->
                                <!--<option value="4"></option>-->
                                <option value="5">BEERFACTORY</option>
                                <option value="6">SET</option>
                            </select>
                        </div>
                        <div class="input-field col s3">
                            Id local:<select name="id_local">
                               <?php foreach ($array as $row): ?>
                                <option value="<?php echo $row->id_unidad;  ?>"><?php echo $row->uni_desc;  ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-field col s3">
                        Id usuario:<input type="text" name="id_usuario" id="id_usuario" placeholder="Id usuario" value="<?php echo $_SESSION['Usuario'] ?>">
                    </div>
                    <button class="waves-effect waves-light btn orange darken-3" name="insertar3" type="submit">Confirmar</button>
                </form>
            </div>
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
      <li><a class="btn-floating brown" href="iniencpreg.php"><i class="material-icons" title="Alta encuestas">check</i></a></li>
      <li><a class="btn-floating Red" href="inialtuni.php"><i class="material-icons" title="Alta de encuestas por unidad">cloud_done</i></a></li>
    </ul>
  </div>

    <div class="divider"></div>
    
    <script>
        var table = document.getElementById('table');

        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
               document.getElementById("id_encuestas").value = this.cells[0].innerHTML;
                         //rIndex = this.rowIndex;
                         

                     };
                 }
             </script>                      
             <script type="text/javascript">
                $(".button-collapse").sideNav();
            </script>
            <script type="text/javascript">
                $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.tooltipped').tooltip({delay: 50});
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('input#input_text, textarea#textarea1').characterCounter();
    });

</script>
</body>
</html>