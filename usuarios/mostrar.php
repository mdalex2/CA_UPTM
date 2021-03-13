
 <?php
if (isset($_GET["id_mos"])){
	$consulta_edit=ejecuta_sql("select * from seguridad where cedula_usu=".$_GET["id_mos"],true);
if ($consulta_edit){
	date_default_timezone_set("America/Caracas");
	$registro=mysql_fetch_array($consulta_edit);
			$cedula=$registro["cedula_usu"];
			$nombre=$registro["nombre_usuario"];
			$apellido=$registro["apellido_usuario"];
			$login=$registro["usuario"];
			$pwd=$registro["clave"];
			$privilegio=$registro["privilegio"];
			
if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) echo "<b><h2>".$_SESSION["msg"]."</b></h2>";
?>                 
<form id="form_editar" name="form_editar" action="<?php echo "usuarios.php?accion=modificar" ?>" method="post" enctype="multipart/form-data" class="uniForm">
<!-- Fieldset -->
  
<fieldset>
<legend>DATOS DEL USUARIO:</legend>

<table  width="..." border="0" align="center">
<tr>
<td colspan="3">
  
  <div class="ctrlHolder">
    <label for="txt_ced">Nº Cédula</label>
    <br>
    <input name="txt_ced" type="text" class="validate[required,custom[integer,minSize[5]] "  id="txt_ced" tabindex="0" value="<?php echo $cedula; ?>" size="15" maxlength="15" />
    <input type="hidden" name="txt_id_ant" value="<?php echo $cedula; ?>" />
    <p class="formHint"> (*) Ejm: 14771188</p>
    
    </div>									
</td>
</tr> 
<tr>
<td>
  
  <div class="ctrlHolder">
    <label for="txt_nom">Nombres</label>
    <br>
    <input name="txt_nom" id="txt_nom" type="text" class="validate[required,minSize[4]]"   tabindex="0" value="<?php echo $nombre; ?>" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: Pedro</p>
    
    </div>									
</td>
<td>&nbsp;</td>
<td><div class="ctrlHolder">
    <label for="txt_ape">Apellidos</label>
    <br>
    <input name="txt_ape" id="txt_ape" type="text" class="validate[required,minSize[4]]"   tabindex="0" value="<?php echo $apellido ?>" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: Perez</p>
    
    </div></td>
</tr>
<tr>
<td colspan="3">
  
  									
</td>
</tr>
<tr>
  <td><div class="ctrlHolder">
    <label for="txt_log">Login</label>
    <br>
    <input name="txt_log" type="text" class="validate[required]" id="txt_log"  tabindex="0" value="<?php  echo $login?>" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 0414-1234567</p>
    
    </div></td>
  <td colspan="2"><div class="ctrlHolder">
    <label for="txt_pwd">Paswword</label>
    <br>
    <input name="txt_pwd" type="password" class="validate[required]" id="txt_pwd"  tabindex="0" value="<?php echo $pwd;?>" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 0414-1234567</p>
    
    </div></td>
</tr>
<tr>
  <td colspan="4"><div class="ctrlHolder">
    <label for="txt_pri">Privilegio</label>
    <br>
    <select name="txt_pri" id="txt_pri" class="cssf validate[required]" size="1">
      <option value="A" <?php if ($privilegio=="A") echo " SELECTED ";?>>Administrador</option>
      <option value="U" <?php if ($privilegio=="U") echo " SELECTED ";?>>Usuario</option> 
      </select>
    <p class="formHint"> (*) Seleccione</p>
    
    </div></td>
</tr>
<tr><td colspan="3">
  <button type="submit" formaction="<?php echo "usuarios.php?accion=modificar" ?>" class="ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all">
    <span class="ui-button-text"><img src="../images/icons_menu/x32/save1_x32.png" width="20" height="20" align="absmiddle">&nbsp;Guardar cambios</span>
    </button>
  <?php 
	$url_elim="usuarios.php?accion=eliminar&id_elim=".$cedula;
?>
  
  <button onclick="if (confirm_elim()){window.location='<?php echo $url_elim;?>';}" type="button"  class="ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all">
    <span class="ui-button-text"><img src=../images/icons_menu/x32/elim_papelera_x32.png width="20" height="20" align="absmiddle">&nbsp;Eliminar</span>
    </button>
  <button id="btn_reset" name="btn_reset" class="ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all" type="reset" onclick="jQuery('#form1').validationEngine('hide');$('#txt_id_func').focus();">
    <span class="ui-button-text"><img src="../images/icons_menu/x32/limpiar_x32.png" width="20" height="20" align="absmiddle"> Reestablecer</span>
    </button>
  </td>
</tr>

</table>
</fieldset>
<!-- End of fieldset -->
</form> 
<?php
  } //cierro si se encontro la consulta y si no hubo error
	}  //cierro si se envio por url el id a mostrar
?>