<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php session_start();echo $_SESSION['juego_caracteres'];//esta variable se declara en modulo verificar login?>"/>
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
    <td align="center"><span class="titulo">REPORTE DE HORARIOS DEL PERSONAL</span><strong><span class="titulo"></span></strong></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse: collapse;font-weight: normal; text-transform:uppercase;" class="margenes">
  <tr>
    <td scope="col"><strong>Nº CÉDULA</strong></td>
    <td scope="col"><strong>NOMBRES</strong></td>
    <td scope="col"><strong>APELLIDOS</strong></td>
    <td scope="col"><strong>turno</strong></td>
    <td scope="col"><strong>hora entrada</strong></td>
    <td scope="col"><strong>hora salida</strong></td>
  </tr>
  <?php
  include_once("../funciones/funciones.php");
  $sql="select horarios_id,horarios.Cedula,personal.Nombre,personal.Apellido,turno,Hora_De_Entrada,Hora_De_Salida FROM (horarios 
		INNER JOIN personal on horarios.Cedula=personal.Cedula
		) ORDER BY personal.Nombre,personal.Apellido ASC";
  $db=conectarse();
  $registros=ejecuta_sql($sql,true);
  if ($registros){
  while ($fila=mysql_fetch_array($registros)){
	 
  ?>
  <tr>
    <td scope="col"><?php echo  $fila["Cedula"];?></td>
    <td scope="col"><?php echo  $fila["Nombre"];?></td>
    <td scope="col"><?php echo  $fila["Apellido"];?></td>
    <td scope="col"><?php 
	switch ( $fila["turno"]){
		case "N":
			echo "NOCHE";
			break;
		case "D":
			echo "DIA";
			break;
		case "M":
			echo "MAÑANA";
			break;			
		case "T":
			echo "TARDE";
			break;
	}
	
	?></td>
    <td scope="col"><?php echo  formato_fecha("H12",$fila["Hora_De_Entrada"]);?></td>
    <td scope="col"><?php echo formato_fecha("H12", $fila["Hora_De_Salida"]);?></td>
  </tr>
  <?php
  } // fin while
  } // fin si encontro registros
  ?>
</table>
<BR /><BR /><BR />
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

