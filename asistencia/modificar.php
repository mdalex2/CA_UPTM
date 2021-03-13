<!DOCTYPE HTML>
<html>
<head>
<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=<?php if (isset($_SESSION['juego_caracteres'])) echo $_SESSION['juego_caracteres']; else echo "utf-8";//esta variable se declara en modulo verificar login?>">
</head>
                 
<?php

function modificar_datos(){
	if (empty($_POST)){ //si no se han recibido datos muestro error
			echo "<h2>No se han recibido datos para almacenar</h2>";
		} else {
			//pongo zona horaria para evitar errores al obtener fecha actual del servidor
			date_default_timezone_set("America/Caracas");
			$id_ant=$_POST["txt_id_ant"];
			$cedula=$_POST["txt_ced"];
			$he=$_POST["txt_he"];
			$hs=$_POST["txt_hs"];
			$hd=$_POST["txt_hd"];
			$hn=$_POST["txt_hn"];
			$turno=$_POST["txt_tur"];
			$db=conectarse();
			$consulta_sql=mysql_query("UPDATE horarios set Cedula='$cedula',
			turno='$turno',
			Hora_De_Entrada='$he',
			Hora_De_Salida='$hs',
			Horas_De_Dia='$hd',
			Horas_De_Noche='$hn' where horarios_id='$id_ant'");
			if (!$consulta_sql){
				  $error=obtener_error(mysql_errno());
					$botones= mostrar_btn_imp_reg();
					mostrar_box("err",false,"INFORMACIÓN","No se pudo guardar el horario en la base de datos: <br>".$error);	
					echo mostrar_btn_imp_reg();
					}		else {
						$_SESSION["msg"]="Los datos del horario se modificaron correctamente";
						$url="horarios.php?accion=mostrar&id_mos=".$id_ant;
					echo '
					<script type="text/javascript">
						window.location="'.$url.'";
					</script>';
					exit();
				
				//header("location:".$url);
			}
		}
		
}
?>
</html>