<?php
session_cache_limiter('nocache,private'); //evita mensaje de sesion expirada al presionar atras en el navegador
session_start();
include_once("../funciones/funciones.php");
include_once("../funciones/errores_genericos.php");
echo verifica_inicio_web();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript" charset="utf-8">
function confirmSubmit()
{
var agree=confirm("¿Está seguro de eliminar éste registro?");
if (agree)
return true ;
else
return false ;
}
function confirm_elim()
{
var agree=confirm("¿ESTÁ SEGURO QUE DESEA ELIMINAR ESTE REGISTRO? \n\n NOTA: SE RECOMIENDA NO ELIMINAR REGISTROS AL MENOS QUE EL MISMO SE HALLA INGRESADO POR ERROR");
if (agree){
	var agree=confirm("¿En realidad deseas eliminar éste registro?\n\n Ésta acción no se podrá deshacer.");
	if (agree)
		return true ;}
else
return false ;
}
</script>



	<meta http-equiv="Content-type" content="text/html; charset=<?php if (isset($_SESSION['juego_caracteres'])){ echo $_SESSION['juego_caracteres'];} else echo "utf-8";//esta variable se declara en modulo verificar login?>" />
	<title><?php echo $_SESSION["nom_sis"]." - ".$_SESSION["nom_sis_cor"]." ".$_SESSION["sis_ver"];?></title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="../js/jquery.jcarousel.pack.js" type="text/javascript"></script>
	<script src="../js/jquery-func.js" type="text/javascript"></script>
	<link rel="stylesheet" href="../js/validaciones/jQuery-Validation/css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="../js/validaciones/jQuery-Validation/css/template.css" type="text/css"/>
	<script src="../js/validaciones/jQuery-Validation/js/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/validaciones/jQuery-Validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    
	<script>
		jQuery(document).ready( function() {
			// binds form submission and fields to the validation engine
			jQuery("#form_crear").validationEngine({autoHidePrompt:true,autoHideDelay: 3500}); 
			jQuery("#form_buscar").validationEngine({autoHidePrompt:true,autoHideDelay: 3500});			
			jQuery("#form_editar").validationEngine({autoHidePrompt:true,autoHideDelay: 3500}); //cambiar #form por el nombre del formulario a validar
			//$('#txt_id_func').focus(); //coloco el cursor en el primer text
		});
	</script>
	<!-- fin de las validaciones -->

  <!-- tema wide -->
</head>
<body>
<div id="page" class="shell">
	<!-- Logo + Search + Navigation -->
	<div id="top">
		<div class="cl">&nbsp;<center><img src="../images/barra_me3.png" width="870px" height="55" /></center></div>
		<!--<h1 id="logo"><a href="#">MONDAYS</a></h1>-->
        <br /><br />
		<div class="cl">&nbsp;</div>
		<div id="navigation">
        <?php
		echo crear_menu_usuario($_SESSION["Privilegio"]);
		?>
		</div>	
	</div>
	<!-- END Logo + Search + Navigation -->
	<!-- Header -->
	<div id="header">
		<!-- Slider --><!-- END Slider -->	
	</div>
	<!-- END Header -->
	<!-- Main -->
	<div id="main">
    
    <?php
	if (isset($_REQUEST["accion"])){
		$accion=$_REQUEST["accion"];
	} else {
		$accion="buscar";
	}
	echo '
	<table>
	<tr>
	   <td >
		<h2>Módulo horarios ('.$accion.')</h2>
	  </td>
	  <td width="30px"></td>
	  <td>
	  &nbsp;<a id="resize" href="horarios.php?accion=nuevo" class="boton" style="font-size:10px;padding:2px; color:#000000;" width="45%" height="90%" title="Crear nuevo" >&nbsp;
                  <img src="../images/icons_menu/x32/calendario_add_x32.png" width="20px" heigth="20px" align="absmiddle"></img>&nbsp;Nuevo&nbsp;
              </a> 
	  </td>	
	  <td>
	  &nbsp;<a id="resize" href="horarios.php?accion=buscar" class="boton" style="font-size:10px;padding:2px; color:#000000;" width="45%" height="90%" title="Buscar" >&nbsp;
                  <img src="../images/icons_menu/x32/find_x32.png" width="20px" heigth="20px" align="absmiddle"></img>&nbsp;Nueva busqueda&nbsp;
              </a> 
	  </td>	
	  
	  <td>
	  &nbsp;<a id="resize" href="reporte.php" class="boton" style="font-size:10px;padding:2px; color:#000000;" width="45%" height="90%" title="Ver listado" target="_blank">&nbsp;
                  <img src="../images/icons_menu/x32/00231.png" width="20px" heigth="20px" align="absmiddle"></img>&nbsp;Listado&nbsp;
              </a> 
	  </td>	  
	  
	  </table>
	';
	switch ($accion){
		case "buscar":
		    unset($_SESSION["msg"]);
			include_once("buscar.php");
			break;
		case "mostrar":
			include_once("mostrar.php");
			break;
		case "modificar":
		    unset($_SESSION["msg"]);
			include_once("modificar.php");
			modificar_datos();
			break;
		case "guardar":
		    unset($_SESSION["msg"]);
			include_once("guardar.php");
			guardar_datos();
			break;
			
		case "nuevo":
			include_once("nuevo.php");
			break;

		case "eliminar":
			include_once("eliminar.php");
			eliminar_datos();
			break;
		
	}
	?>
	</div>
	<!-- END Main -->
	<!-- Footer -->
	<div id="footer">
    <?php 
		echo crear_pie_pag();
	?>
	</div>
	<!-- END Footer -->
	<br />
</div>
</body>
</html>