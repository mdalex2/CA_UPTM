<!DOCTYPE HTML>
<html>
<head>
<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=<?php if (isset($_SESSION['juego_caracteres'])) echo $_SESSION['juego_caracteres']; else echo "utf-8";//esta variable se declara en modulo verificar login?>">
</head>
                 
<?php

function guardar_datos(){
	if (empty($_POST)){ //si no se han recibido datos muestro error
			echo "<h2>No se han recibido datos para almacenar</h2>";
		} else {
			//pongo zona horaria para evitar errores al obtener fecha actual del servidor
			date_default_timezone_set("America/Caracas");
			
			$cedula=$_POST["txt_ced"];
			$id_ant=$_POST["txt_ced"];
			$nombre=$_POST["txt_nom"];
			$apellido=$_POST["txt_ape"];
			$login=$_POST["txt_log"];
			$password=$_POST["txt_pwd"];
			$privilegio=$_POST["txt_pri"];
			$db=conectarse();
			$consulta_sql=mysql_query("insert into seguridad  (cedula_usu, 	nombre_usuario,apellido_usuario,usuario, 	clave,privilegio) values 
			('$cedula',
			'$nombre',
			'$apellido',
			'$login',
			'$password',
			'$privilegio'
			)");
			if (!$consulta_sql){
				  $error=obtener_error(mysql_errno());
					$botones= mostrar_btn_imp_reg();
					mostrar_box("err",false,"INFORMACIÓN","No se pudo guardar el registro en la base de datos: <br>".$error);	
					echo mostrar_btn_imp_reg();
					}		else {
						$_SESSION["msg"]="Los datos se guardaron correctamente";
						$url="usuarios.php?accion=mostrar&id_mos=".$id_ant;
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