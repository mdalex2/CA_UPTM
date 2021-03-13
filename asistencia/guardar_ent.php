<!DOCTYPE HTML>
<html>
<head>
<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=<?php if (isset($_SESSION['juego_caracteres'])) echo $_SESSION['juego_caracteres']; else echo "utf-8";//esta variable se declara en modulo verificar login?>">
</head>
                 
<?php

function guardar_ent(){
			//pongo zona horaria para evitar errores al obtener fecha actual del servidor
			date_default_timezone_set("America/Caracas");
			$cedula=$_SESSION["ced_usu_ses"];
			aplica_conf_global();//formato hora venezuela
			//dentro de las funciones
			//obtengo la fecha del servudor mysql
			$fecha=date("Y-m-d");
			$hora_mysql=date("H:i:s");
			$hora_normal=formato_fecha("H12",$hora_mysql);
			$db=conectarse();
			$consulta_sql=mysql_query("insert into asistencias (Cedula,Fecha,Hora_E) values 
			('$cedula',
			'$fecha',
			'$hora_mysql'
			)");
			if (!$consulta_sql){
				  $num_error=mysql_errno();
				  if ($num_error==1062){
					  mostrar_box("err",false,"INFORMACIÓN","Usted ya registró su entrada, no puede registrar mas entradas para el día de hoy, pruebe registrar su salida");
				  } else {
				  $error=obtener_error(mysql_errno());
					$botones= mostrar_btn_imp_reg();
					mostrar_box("err",false,"INFORMACIÓN","No se pudo guardar el registro en la base de datos: <br>".$error);	
					echo mostrar_btn_imp_reg();
				  }
					}		else {
						$_SESSION["msg"]="Los datos se guardaron correctamente";
						$url="asistencia.php?accion=mostrar&id_mos=".$cedula;
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