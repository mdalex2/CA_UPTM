<!DOCTYPE HTML>
<html>
<head>
<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=<?php if (isset($_SESSION['juego_caracteres'])) echo $_SESSION['juego_caracteres']; else echo "utf-8";//esta variable se declara en modulo verificar login?>">
</head>
                 
<?php

function guardar_sal(){
			//pongo zona horaria para evitar errores al obtener fecha actual del servidor
			date_default_timezone_set("America/Caracas");
			$cedula=$_SESSION["ced_usu_ses"];
			aplica_conf_global();
			$fecha=date("Y-m-d");
			$hora_mysql=date("H:i:s");
			$hora_normal=formato_fecha("H12",$hora_mysql);
			$db=conectarse();
			$consulta_sql=mysql_query("update asistencias set 			
			Horas_S='$hora_mysql'  
			WHERE date(Fecha)=date('$fecha') and Cedula='$cedula'
			");
			if (!$consulta_sql){
				  $error=obtener_error(mysql_errno());
					$botones= mostrar_btn_imp_reg();
					mostrar_box("err",false,"INFORMACIÓN","No se pudo guardar el registro en la base de datos: <br>".$error);	
					echo mostrar_btn_imp_reg();
				  
					}		else {
						$_SESSION["msg"]="Los datos se guardaron correctamente";
						$url="asistencia.php?accion=reporte&id_mos=".$cedula;
					echo '
					<script type="text/javascript">
						window.location="'.$url.'";
					</script>';
					exit();
				
				//header("location:".$url);
			}
		}
		
?>


</html>