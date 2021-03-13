<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php error_reporting(0);session_start();echo $_SESSION['juego_caracteres'];//esta variable se declara en modulo verificar login?>"/>
<title>Listado de personal</title>
<style type="text/css">
.margenes td{
padding-left: 3px;
padding-right: 3px;
}
.titulo {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	text-transform: uppercase;
	font-weight: bold;
	margin-bottom: 2px;
	text-align: left;
}
.SaltoDePagina {
PAGE-BREAK-AFTER: always
}
.cursiva {
	font-style: italic;
	font-weight: bold;
}
.cursiva {
	font-style: italic;
}
</style>
</head>

<body style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">

<?php
function encabezado_pag(){
	
	?>
<table width="100%" border="0">
  <tr>
    <td><img src="../images/barra_me3.png" width="100%"/></td>
    <td><img src="../images/corazon_vzlano_peq.png" width="79" height="74" /></td>
  </tr>
</table>
<?php
}

?>

<table id="tb" width="100%" border="0" align="center">
  <tr>
    <td width="30%"></td>
    <td width="40%" align="center">
<script type="text/javascript">
function imprimir()
	{
		//var Obj = document.getElementById("imprimir");
		//var Obj1 = document.getElementById("cerrar");
		var Obj2 = document.getElementById("tb");
		Obj2.style.display='none';
		 window.print();
		Obj2.style.display = 'table';
	}
</script>
<button type="button" name="imprimir" id="imprimir" value="Imprimir" onclick="imprimir();"><img src="../images/icons_menu/x32/printer2_x32.png" width="24" height="24" align="absmiddle" />&nbsp;Imprimir</button>
&nbsp;

<button type="button" name="cerrar" id="cerrar" value="Imprimir" onclick="window.close();"><img src="../images/close_windows.png" width="24" height="24" align="absmiddle" />&nbsp;Cerrar</button>
</td>
    <td width="30%" align="center"></td>
  </tr>
  
</table>

<body style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
<?php echo encabezado_pag();?>
<table width="100%" border="0">
  <tr>
    <td align="center"><span class="titulo">REPORTE DE INASISTENCIA PERSONAL</span><strong><span class="titulo"> (consulta GENERAL)</span></strong></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse: collapse;font-weight: normal; text-transform:uppercase;" class="margenes">
  <tr>
   
    <td scope="col"><strong>FECHA</strong></td>
    <td scope="col"><strong>Nº CÉDULA</strong></td>
    <td scope="col"><strong>NOMBRES</strong></td>
    <td scope="col"><strong>APELLIDOS</strong></td>
    <td scope="col"><strong>TURNO</strong></td>
    <td scope="col"><strong>CARGO</strong></td>
    <td scope="col"><strong>horaS A DESCONTAR</strong></td>
    <td scope="col"><strong>HORARIO</strong></td>
  </tr>
  <?php
include_once("../funciones/funciones.php");
$db=conectarse();
aplica_conf_global();
$fecha_ini=$_POST["txt_desde"];
$fecha_ini=date("Y-m-d",strtotime($fecha_ini));
$fecha_fin=$_POST["txt_hasta"];
$fecha_fin=date("Y-m-d",strtotime($fecha_fin));
for ($fecha=$fecha_ini;$fecha<=$fecha_fin;$fecha++){
	$dia_semana=date("w",strtotime($fecha));
	if ($dia_semana!=0 || $dia_semana !=6){
		$sql_empleado="select personal.*,horarios.*  from (personal 
		INNER JOIN horarios on personal.Cedula=horarios.Cedula
		)";
		$res_emp=ejecuta_sql($sql_empleado,false);
		if ($res_emp) {
			while ($fila_emp=mysql_fetch_array($res_emp)){
				$cedula_act=$fila_emp["Cedula"];
				$nombres=$fila_emp["Nombre"];
				$apellidos=$fila_emp["Apellido"];
				$horas_desc=$fila_emp["Horas_De_Dia"]+$fila_emp["Horas_De_Noche"];
				$horario=formato_fecha("H12",$fila_emp["Hora_De_Entrada"])." - ".formato_fecha("H12",$fila_emp["Hora_De_Salida"]);
				$cargo=$fila_emp["cargo"];
				switch ( $fila_emp["turno"]){
					case "N":
						$turno= "NOCHE";
						break;
					case "D":
						$turno=  "DIA";
						break;
					case "M":
						$turno=  "MAÑANA";
						break;
						
					case "T":
						$turno=  "TARDE";
						break;
				}
				
				if (verifica_dia($cedula_act,$fecha)==false){
					?>
                    <tr>
                        
                        <td scope="col"><?php echo  formato_fecha("M",$fecha);?></td>
                        <td scope="col"><?php echo  $fila_emp["Cedula"];?></td>
                        <td scope="col"><?php echo $nombres;?></td>
                        <td scope="col"><?php echo $apellidos;?></td>
                        <td scope="col"><?php echo $turno;?></td>
						<td scope="col"><?php echo $cargo;?></td>                        
                        <td scope="col"><?php echo $horas_desc;?></td>
                        <td scope="col"><?php echo $horario;?></td>
                      </tr>                    
                    <?php
				}
			}
			
			
			
		}
	}
	//echo $fecha." dia de la semana: ".date("w",strtotime($fecha))."<br>";
	//echo $fecha_ini." - ".$fecha_fin."usu: ".$cedula;
}
?>

  

</table>
<BR /><BR /><BR />
<h2>&nbsp;</h2>
<!--
<table width="100%" border="0">
  <tr>
    <th scope="col" width="30%" align="left">&nbsp;</th>
    <th scope="col" >&nbsp;</th>
    <th scope="col" width="30%" style="border-top:1px solid black;">&nbsp;</th>
  </tr>
</table>
-->
</body>

</html>

<?php
function verifica_dia($cedula_act,$fecha_act){
	$fecha_act=date("Y-m-d",strtotime($fecha_act));
	//$con_ina=conectarse();
	$sql_ina="SELECT Cedula from asistencias WHERE Cedula='$cedula_act' AND Fecha=date('$fecha_act')";
	$registros_ina=ejecuta_sql($sql_ina,false);
	if ($registros_ina  && mysql_num_rows($registros_ina)>0){
		$asistio=true;
	} else {
		$asistio=false;
	}
	return $asistio;
}

?>