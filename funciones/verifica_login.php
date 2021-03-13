<?php
//Activando conexión
	  require_once("../adodb/adodb.inc.php");
	  require_once("funciones.php");
	  GLOBAL $_SESSION;
	  session_start();
	  $db=conectarse();
$sql="SELECT * FROM seguridad WHERE usuario= '".$_POST["usuario"]."' AND clave= '".$_POST["clave"]."'" ;
		  $rsUser=$db->Execute($sql) or DIE($db->ErrorMsg());
		  if (!$rsUser->EOF) {
//usuario válido
                $_SESSION["Usuario"]= $_POST["usuario"];
				$_SESSION["ced_usu_ses"]= $rsUser->fields("cedula_usu");
				$_SESSION["nom_ape_ses"]= $rsUser->fields("nombre_usuario")." ".$rsUser->fields("apellido_usuario");
				$_SESSION["Clave"]= $_POST["clave"];
				$_SESSION["Privilegio"]= $rsUser->fields("privilegio");
				$_SESSION["logueado"]=true;
				$_SESSION["nom_sis"]="Sistema para Registro y Control de Asistencia";
				$_SESSION["nom_sis_cor"]="(SCAPAUPTMKR)";
				$_SESSION["sis_ver"]="Ver. 2013.1";
				$_SESSION['juego_caracteres']="utf-8";
				
				header("location: ../menu_principal/menu_principal.php");
				exit();
				
		  } else { 
	      	  header ("Location: ../index.php?err=1");
		       exit;
		      }

?>