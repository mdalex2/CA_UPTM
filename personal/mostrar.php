
 <?php
if (isset($_GET["id_mos"])){
	$consulta_edit=ejecuta_sql("select * from personal where cedula=".$_GET["id_mos"],true);
if ($consulta_edit){
	date_default_timezone_set("America/Caracas");
	$registro=mysql_fetch_array($consulta_edit);
			$cedula=$registro["Cedula"];
			$nombre=$registro["Nombre"];
			$apellido=$registro["Apellido"];
			$sexo=$registro["Sexo"];
			$direccion=$registro["Direccion"];
			$telf=$registro["Telefono"];
			$cargo=$registro["cargo"];
			
if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) echo "<b><h2>".$_SESSION["msg"]."</b></h2>";
?>                 
<form id="form_editar" name="form_editar" action="<?php echo "personal.php?accion=modificar" ?>" method="post" enctype="multipart/form-data" class="uniForm">
<!-- Fieldset -->
  
<fieldset>
<legend>DATOS DEL PERSONAL:</legend>

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
    <label for="txt_sex">Sexo</label>
    <br>
    <select name="txt_sex" id="txt_sex" class="cssf validate[required]" size="1">
      <option value="M" <?php if ($sexo=="M") echo " SELECTED ";?>>Masculino</option>
      <option value="F" <?php if ($sexo=="F") echo " SELECTED ";?>>Femenino</option> 
      </select>
    <p class="formHint"> (*) Seleccione</p>
    
    </div></td>
  <td colspan="2"><div class="ctrlHolder">
    <label for="txt_tel">Teléfono</label>
    <br>
    <input name="txt_tel" id="txt_tel" type="text" class="validate[required,custom[phone]]"  tabindex="0" value="<?php echo $telf ?>" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 0414-1234567</p>
    
    </div></td>
</tr>
<tr>
  <td colspan="4">
    <div class="ctrlHolder">
      <label for="txt_dir">Dirección</label>
      <br>
      <textarea name="txt_dir" id="txt_dir" rows="4" class='validate[optional,maxSize[250]] textarea_small'  style="width:99%"><?php echo $direccion; ?></textarea>
      <p class="formHint"> Dirección del empleado</p>
      
      </div>  
    </td>
<tr>
<td>
  
  <div class="ctrlHolder">
    <label for="txt_nom">Cargo</label>
    <br>
    <input name="txt_car" type="text" class="validate[required,minSize[4]]" id="txt_car"   tabindex="0" value="<?php echo $cargo;?>" size="50" maxlength="50" />
    <p class="formHint"> (*) Ejm: Pedro</p>
    
    </div>									
</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>    
</tr>
<tr><td colspan="3">
  <button type="submit" formaction="<?php echo "personal.php?accion=modificar" ?>" class="ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all">
    <span class="ui-button-text"><img src="../images/icons_menu/x32/save1_x32.png" width="20" height="20" align="absmiddle">&nbsp;Guardar cambios</span>
    </button>
  <?php 
	$url_elim="personal.php?accion=eliminar&id_elim=".$cedula;
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