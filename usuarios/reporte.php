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
    <td align="center"><span class="titulo">LISTADO DE USUARIOS DEL SISTEMA</span><strong><span class="titulo"></span></strong></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse: collapse;font-weight: normal; text-transform:uppercase;" class="margenes">
  <tr>
    <td scope="col"><strong>Nº CÉDULA</strong></td>
    <td scope="col"><strong>NOMBRES</strong></td>
    <td scope="col"><strong>APELLIDOS</strong></td>
    <td scope="col"><strong>LOGIN</strong></td>
    <td scope="col"><strong>TIPO</strong></td>
  </tr>
  <?php
  include_once("../funciones/funciones.php");
  $sql="select cedula_usu,nombre_usuario,apellido_usuario,usuario,privilegio from seguridad";
  $db=conectarse();
  $registros=ejecuta_sql($sql,true);
  if ($registros){
  while ($fila=mysql_fetch_array($registros)){
	 
  ?>
  <tr>
    <td scope="col"><?php echo  $fila["cedula_usu"];?></td>
    <td scope="col"><?php echo  $fila["nombre_usuario"];?></td>
    <td scope="col"><?php echo  $fila["apellido_usuario"];?></td>
    <td scope="col"><?php echo  $fila["usuario"];?></td>
    <td scope="col"><?php if ($fila["privilegio"]=="A") echo  "ADMINISTRADOR"; else echo "USUARIO";?></td>

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

