<!DOCTYPE HTML>
<html>
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; 
charset=<?php echo $_SESSION['juego_caracteres'];//esta variable se declara en modulo verificar login?>">
</head>
<!-- PARA BUSCAR-->    
                  
<form id="form_buscar" name="form_buscar" action="<?php echo "personal.php?accion=buscar" ?>" method="post" enctype="multipart/form-data" class="uniForm">
<fieldset>
<legend>Buscar:</legend>
<table align="center" width="100%">
<tr>
<td width="185">
<div class="ctrlHolder">
<label for="cmb_tip_bus">Tipo de busqueda</label>
<br>
<SELECT NAME="cmb_tip_bus" id="cmb_tip_bus" SIZE=1 class="mf validate[required]" onChange='
var valor = $("#cmb_tip_bus option:selected").html().toLowerCase();
$("#lbl_text_busc").text("Escriba "+valor+" a buscar");
$("#lbl_text_busc1").val("Escriba "+valor+" a buscar");
$("#txt_buscar").focus();'> 
<OPTION VALUE="cedula_usu" <?php if (isset($_POST["cmb_tip_bus"]) && $_POST["cmb_tip_bus"]=="cedula_usu") echo " selected ";?>>Nº C&Eacute;DULA</OPTION>
<OPTION VALUE="nombre_usuario" <?php if (isset($_POST["cmb_tip_bus"]) && $_POST["cmb_tip_bus"]=="nombre_usuario") echo " selected " ?>>NOMBRES</OPTION>
<OPTION VALUE="apellido_usuario" <?php if (isset($_POST["cmb_tip_bus"]) && $_POST["cmb_tip_bus"]=="apellido_usuario") echo " selected " ?>>APELLIDOS</OPTION>
<OPTION VALUE="usuario" <?php if (isset($_POST["cmb_tip_bus"]) && $_POST["cmb_tip_bus"]=="usuario") echo " selected " ?>>LOGIN</OPTION>

</SELECT>
<p class="formHint"> (*) Seleccione el tipo de b&uacute;squeda</p>
</div></td>
<td width="220">
<div class="ctrlHolder">

  <label for="txt_buscar" id="lbl_text_busc"><?php if (isset($_POST["lbl_text_busc1"])) echo $_POST["lbl_text_busc1"]; else echo " Escriba Nº cédula a buscar"; ?></label><br>
  <input name="txt_buscar" type="text" class="validate[required,minSize[1]] text-input sf"  id="txt_buscar" tabindex="0" value="<?php if (isset($_POST['txt_buscar'])){ echo $_POST['txt_buscar'];}?>" maxlength="20" autofocus/>
  <input type="hidden" id="lbl_text_busc1" name="lbl_text_busc1" value="<?php if (isset($_POST["lbl_text_busc1"])) echo $_POST["lbl_text_busc1"]; else echo " Escriba el texto a buscar"; ?>">
  <p class="formHint"> (*) Requerido </p>
</div>
</td>
<td width="85">  
<button formaction="<?php echo "usuarios.php?accion=buscar" ?>" class="ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all" type="submit">
<span class="ui-button-text"><img src="../images/icons_menu/x32/find_x32.png" width="20" height="20" align="absmiddle">&nbsp;Buscar</span>
</button> 
</td>
</tr>
</table>   
</fieldset>            
</form>
</legend>
<?php 
	if (isset($_POST["txt_buscar"]) && isset($_POST["cmb_tip_bus"])){
		$campo_buscar=$_POST['cmb_tip_bus'];
		$texto_buscar=$_POST["txt_buscar"];
		if ($texto_buscar=="*" || strtoupper($texto_buscar)=="TODO"){
		$consulta=ejecuta_sql("select cedula_usu,nombre_usuario,apellido_usuario FROM seguridad ORDER BY nombre_usuario,apellido_usuario ASC",true);} else {
		$consulta=ejecuta_sql("select cedula_usu,nombre_usuario,apellido_usuario FROM seguridad where  $campo_buscar LIKE '%$texto_buscar%' ORDER BY nombre_usuario,apellido_usuario ASC",true);} 
		
		if ($consulta)
			{
				if (mysql_num_rows($consulta)==1) {
					$fila=mysql_fetch_array($consulta);
					$url="usuarios.php?accion=mostrar&id_mos=".$fila['cedula_usu'];
					echo '
					<script type="text/javascript">
						window.location="'.$url.'";
					</script>';
					//header("location:$url");
					exit();
					} 
					//cierro si solo se encontro un registro
				else
				{
?>
<table id="tablasinbtn_desc" class="letra_16 mouse_hover" width="..."> 
        <thead> 
          <tr>
            <th width="...">Nº CÉDULA</th>
            <th width="...">NOMBRES</th>
            <th width="...">APELLIDOS</th>
            <th title="Opciones" width="80px">OPC.</th>
          </tr> 
        </thead> 
        <tbody> 
        <?php
				while ($fila=mysql_fetch_array($consulta))
				{
				?>
          <tr>
            <td align="center"><?php echo $fila["cedula_usu"]?></td>
            <td><?php echo $fila["nombre_usuario"];?></td>
            <td align="center"><?php echo $fila["apellido_usuario"]?></td>
            <!-- si permite editar muestro el boton que permite enviar la varible edicion oculta y permite editar -->
            <!-- agrego la opcion de eliminar -->
            <td align="center">
 			<a id="resize" href="usuarios.php?<?php echo "accion=mostrar&id_mos={$fila['cedula_usu']}";?>" class="boton" style="font-size:10px;padding:2px; color:#000000;" width="45%" height="90%" title="Mostrar" >&nbsp;
                  <img src='../images/icons_menu/x32/consul_nota.png' width='16px' heigth='16px' align='absmiddle'></img>&nbsp;Mostrar&nbsp;
              </a>            </td>
            
          </tr> 
         <?php 
         } //fin de ciclo while
         ?>
        </tbody> 
  </table>
  <?php
			}
			}// fin de si hubo consulta
	} //cierro el si se envio el form  
	?>
<!-- FIN DE BUSCAR-->		
</html>