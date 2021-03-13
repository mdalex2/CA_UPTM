<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php error_reporting(0); session_start();echo $_SESSION['juego_caracteres'];//esta variable se declara en modulo verificar login?>"/>
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
  include_once("../funciones/primer_ultimo_dia_mes.php");
  include_once("../funciones/funciones.php");
$dias = new Dias();
aplica_conf_global();
$fecha= date("Y-m-d");
$fecha_ini=$dias->primerDiaMes($fecha);
$fecha_fin=$dias->ultimoDiaMes($fecha);
$fecha_ini=date("Y-m-d",strtotime($fecha_ini));
$fecha_fin=date("Y-m-d",strtotime($fecha_fin));

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
    <td align="center"><span class="titulo">REPORTE DE ASISTENCIA PERSONAL</span><strong><span class="titulo"> (consulta GENERAL)&nbsp; <?php echo "DESDE: ".date("d-m-Y",strtotime($fecha_ini))." HASTA: ".date("d-m-Y",strtotime($fecha_fin));?></span></strong></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse: collapse;font-weight: normal; text-transform:uppercase;" class="margenes">
  <tr>
    <td scope="col"><strong>Nº</strong></td>
    <td scope="col"><strong>FECHA</strong></td>
    <td scope="col"><strong>Nº CÉDULA</strong></td>
    <td scope="col"><strong>NOMBRES</strong></td>
    <td scope="col"><strong>APELLIDOS</strong></td>
    <td scope="col"><strong>turno</strong></td>
    <td scope="col"><strong>horario</strong></td>
    <td scope="col"><strong>CARGO</strong></td>
    <td scope="col"><strong>hora entrada</strong></td>
    <td scope="col"><strong>hora salida</strong></td>
    <td scope="col"><strong>HORAS LABORADAS</strong></td>
  </tr>
  <?php

$cedula=$_SESSION["ced_usu_ses"];
$tot_horas_lab=0;
$tot_horas_lab=date("H:m:s",$tot_horas_lab);
//echo $fecha_ini." - ".$fecha_fin."usu: ".$cedula;
  $sql="select asistencias.*,personal.Nombre,personal.Apellido,personal.cargo,TIMEDIFF(Horas_S,Hora_E) as horas_lab,horarios.turno,horarios.Hora_De_Entrada,horarios.Hora_De_Salida FROM (asistencias 
		INNER JOIN personal on asistencias.Cedula=personal.Cedula 
				INNER JOIN horarios on horarios.Cedula=asistencias.Cedula 
		) WHERE Fecha between DATE('$fecha_ini') and DATE('$fecha_fin') ORDER BY Fecha,Hora_E ASC";
  $db=conectarse();
  $registros=ejecuta_sql($sql,true);
  if ($registros){
	  $cont=0;
  while ($fila=mysql_fetch_array($registros)){
	 $cont++;
  ?>
  <tr>
    <td scope="col"><?php echo $cont;?></td>
    <td scope="col"><?php echo  formato_fecha("M",$fila["Fecha"]);?></td>
    <td scope="col"><?php echo  $fila["Cedula"];?></td>
    <td scope="col"><?php echo  $fila["Nombre"];?></td>
    <td scope="col"><?php echo  $fila["Apellido"];?></td>
    <td scope="col"><?php echo  $fila["turno"];?></td>
    <td scope="col"><?php echo  formato_fecha("H12S",$fila["Hora_De_Entrada"]).'-'.formato_fecha("H12S",$fila["Hora_De_Salida"]);?></td>
    <td scope="col"><?php echo  $fila["cargo"];?></td>
    <td scope="col"><?php echo  formato_fecha("H12S",$fila["Hora_E"]);?></td>
    <td scope="col">
	<?php 	if ($fila["Horas_S"]=='00:00:00'){
		echo "-";
	} else {
		echo formato_fecha("H12S", $fila["Horas_S"]);
	}
?>
</td>
    <td scope="col">
	<?php 
	if ($fila["horas_lab"]>0){
		echo  $fila["horas_lab"];
	} else {
		echo "0";
	}
	?>
    </td>
  </tr>
  <?php
  } // fin while
  } // fin si encontro registros
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

