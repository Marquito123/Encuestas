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
    <title>Registro de preguntas</title>
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
    <?php 
        $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
        if (isset($_POST['insertar4'])) {
            $id_encuesta=$_POST['id_encuesta'];
            $id_pregunta=$_POST['id_pregunta'];
            $preg_texto=$_POST['preg_texto'];
            $preg_orden=$_POST['preg_orden'];
            $id_tipo_preg=$_POST['id_tipo_preg'];
            $preg_respuestas=$_POST['preg_respuestas'];
            $id_usuario=$_POST['id_usuario'];
            $Estatus=$_POST['Estatus'];

            $_SESSION['id_pregunta']=$id_pregunta;
            $_SESSION['preg_texto']=$preg_texto;

            $insertarUno=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
            $res=$client->Cambia_Preguntas($_POST);
            //var_dump($res);
        }

        foreach ($res as $obj) {
            $json = (string)$obj;
        } 

        $userLogin = json_decode($json);
        foreach($userLogin as $obj){ 
            echo $obj->id_pregunta;

            if ($obj->codigo == OK ){      
                echo '<script type="text/javascript">';
                echo 'alert("Registro exitoso")';
                echo "</script>";
                echo '<meta http-equiv="Refresh" content="0;URL=inicambiapre.php">';
                echo "$userLogin->codigo";    
            }else{
                echo '<script type="text/javascript">';
                echo 'alert("Registro incorrecto:")';
                echo "</script>";
                echo '<meta http-equiv="Refresh" content="0;URL=inicambiapre.php">';
            }
        }

        $_SESSION['id_pregunta']=$obj->id_pregunta;
    ?>

    <?php
        $_POST['Llave']="011rpyp.125lntzyoppyn.128p.126.127l.126";
        if  (isset($_POST['insertar0'])) {
            $id_usuario=$_POST['id_usuario'];
        
            $insertarUno=$client=new SoapClient("http://gabmartinc-001-site2.htempurl.com/ws_encuesta/ws_encuesta.asmx?WSDL",($_POST));
            $res=$client->Cat_Preguntas($_POST);
                //var_dump($res);
        }
    ?>

    <?php  
        foreach ($res as $obj) {
            $json = (string)$obj;
        } 
         
        //echo($json)
        $userLogin = json_decode($json);
        foreach($userLogin as $obj){ 
        //echo $obj->id_pregunta;
        //echo $obj->preg_texto;
        }
    
        $_SESSION['id_pregunta']=$obj->id_pregunta;
        $_SESSION['preg_texto']=$obj->preg_texto;
                            //con esta linea hacemos que la tabla se llene obtemiendo los datos del ws
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
                        <th width="10%">Id encuesta</th>
                        <th width="10%">Id pregunta</th>
                        <th width="10%">Orden</th>
                        <th width="40%">Texto</th>
                        <th width="10%">Tipo</th>
                        <th width="10%">Respuestas</th>
                        <th width="10%">Estatus</th>
                    </tr>
                </thead>
                <!--con esta parte llenamos la tabla-->
                <tbody>
                    <?php foreach ($array as $row): ?>
                        <tr>
                            <td height="1%"><?php echo $row->id_encuestas;  ?></td>
                            <td height="1%"><?php echo $row->id_pregunta;  ?></td>
                            <td height="1%"><?php echo $row->preg_orden; ?></td>
                            <td height="1%"><?php echo $row->preg_texto;  ?></td>
                            <td height="1%"><?php echo $row->id_tipo_preg;  ?></td>
                            <td height="1%"><?php echo $row->preg_respuestas;  ?></td>
                            <td height="1%"><?php echo $row->preg_estatus;  ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div id="activa" class="section scrollspy">
                <form method="post" class="col s12">
                    <h5 class="center"><?php echo $_SESSION['descripcion'] ?></h5>
                    <div class="input-field col s4">
                        <input type="text" name="id_encuesta" placeholder="id_encuesta" id="id_encuestas" value="<?php echo $_SESSION['id_encuestas'] ?>">
                    </div>
                    <div class="input-field col s4">
                        <input type="text" name="id_pregunta" placeholder="id_ptrgunta" id="id_pregunta" value="<?php echo $_SESSION['id_pregunta'] ?>">
                    </div>
                    <div class="input-field col s4">
                        <input type="text" name="preg_orden" placeholder="Orden" value="" id="preg_orden">
                    </div>
                    <div class="input-field col s4">
                        <input type="text" name="preg_texto" placeholder="Texto de pregunta" value="" id="preg_texto">
                    </div>
                    <div class="input-field col s4">
                        <select name="id_tipo_preg">
                            <option value="" disabled selected id="id_tipo_preg">Tipo de pregunta</option>
                            <option value="1">Escalar</option>
                            <option value="2">Opción Multiple</option>
                            <option value="3">Elección Múltiple</option>
                            <option value="4">Catálogo</option>
                            <option value="5">Abiertas</option>
                        </select>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" name="preg_respuestas" placeholder="preg_respuestas" value="" id="preg_respuestas">
                    </div>
                    <div class="input-field col s4">
                        <input type="text" name="id_usuario" placeholder="Id usuario" value="<?php echo $_SESSION['Usuario'] ?>">
                    </div>
                    <div class="input-field col s4">
                        <select name="Estatus">
                            <option value="" disabled selected>Elige</option>
                            <option value="1">Vigente</option>
                            <option value="0">No vigente</option>   
                        </select>
                    </div>
                    <button name="insertar4" type="submit">Registrar</button>
                </form>
            </div>
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


    <script>
        var table = document.getElementById('table');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         document.getElementById("id_encuestas").value = this.cells[0].innerHTML;
                         //rIndex = this.rowIndex;
                         document.getElementById("id_pregunta").value = this.cells[1].innerHTML;
                         document.getElementById("preg_orden").value = this.cells[2].innerHTML;
                         document.getElementById("preg_texto").value = this.cells[3].innerHTML;
                         document.getElementById("id_tipo_preg").value = this.cells[4].innerHTML;
                         document.getElementById("preg_respuestas").value = this.cells[5].innerHTML;

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