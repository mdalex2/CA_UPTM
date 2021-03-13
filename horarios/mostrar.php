
 <?php
if (isset($_GET["id_mos"])){
	$consulta_edit=ejecuta_sql("select horarios.*,personal.Nombre,Personal.Apellido from (horarios 
	INNER JOIN personal on horarios.Cedula=personal.Cedula
	
	)where horarios_id=".$_GET["id_mos"],true);
if ($consulta_edit){
	date_default_timezone_set("America/Caracas");
	$registro=mysql_fetch_array($consulta_edit);
			$id=$registro["horarios_id"];
			$cedula=$registro["Cedula"];
			$nombre=$registro["Nombre"];
			$apellido=$registro["Apellido"];
			$turno=$registro["turno"];
			$hora_ent=$registro["Hora_De_Entrada"];
			$hora_sal=$registro["Hora_De_Salida"];
			$horas_dia=$registro["Horas_De_Dia"];
			$horas_noche=$registro["Horas_De_Noche"];
			
if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) echo "<b><h2>".$_SESSION["msg"]."</b></h2>";
?>                 
<form id="form_editar" name="form_editar" action="<?php echo "horarios.php?accion=modificar" ?>" method="post" enctype="multipart/form-data" class="uniForm">
<!-- Fieldset -->
  
<fieldset>
<legend>Horarios:</legend>

<table  width="..." border="0" align="center">
<tr>
  <td colspan="3">
    
    <div class="ctrlHolder">
      <p>
        <label for="txt_ced">Nº Cédula</label>
        <br>
        <input name="txt_ced" type="text" class="validate[required,custom[integer,minSize[5]] "  id="txt_ced" tabindex="0" value="<?php echo $cedula; ?>" size="15" maxlength="15" />
        <input type="hidden" name="txt_id_ant" value="<?php echo $id; ?>" /><?php echo "&nbsp;".$nombre." ".$apellido?>
      </p>
      <p class="formHint"> (*) Ejm: 14771188</p>
      
      </div>									
  </td>
</tr> 
<tr>
<td>
  
  <div class="ctrlHolder">
    <label for="txt_hd">Hora entrada</label>
    <br>
    <input name="txt_he" id="txt_he" type="text" class="validate[required,minSize[4]]"   tabindex="0" value="<?php echo $hora_ent; ?>" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 08:00:00</p>
    
    </div>									
</td>
<td>&nbsp;</td>
<td><div class="ctrlHolder">
    <label for="txt_hn">Hora salida</label>
    <br>
    <input name="txt_hs" id="txt_hs" type="text" class="validate[required,minSize[4]]"   tabindex="0" value="<?php echo $hora_sal ?>" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 10:00:00</p>
    
    </div></td>
</tr>
<tr>
<td>
  
  <div class="ctrlHolder">
    <label for="txt_hd">Hora diurnas</label>
    <br>
    <input name="txt_hd" id="txt_hd" type="text" class="validate[required,minSize[1],custom[integer]]"   tabindex="0" value="<?php echo $horas_dia; ?>" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 08:00:00</p>
    
    </div>									
</td>
<td>&nbsp;</td>
<td><div class="ctrlHolder">
    <label for="txt_hn">Hora nocturnas</label>
    <br>
    <input name="txt_hn" id="txt_hn" type="text" class="validate[required,minSize[1],custom[integer]]"   tabindex="0" value="<?php echo $horas_noche ?>" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 10:00:00</p>
    
    </div></td>
</tr>
<tr>
<td colspan="3">
  
  									
</td>
</tr>
<tr>
  <td><div class="ctrlHolder">
    <label for="txt_tur">Turno</label>
    <br>
    <select name="txt_tur" id="txt_tur" class="cssf validate[required]" size="1">
      <option value="M" <?php if ($turno=="M") echo " SELECTED ";?>>MAÑANA</option>
      <option value="T" <?php if ($turno=="T") echo " SELECTED ";?>>TARDE</option> 
      <option value="N" <?php if ($turno=="N") echo " SELECTED ";?>>NOCHE</option> 
      <option value="D" <?php if ($turno=="D") echo " SELECTED ";?>>DIA COMPLETO</option> 
      </select>
    <p class="formHint"> (*) Seleccione</p>
    
    </div></td>
  <td colspan="2">&nbsp;</td>
</tr>
<tr><td colspan="3">
  <button type="submit" formaction="<?php echo "horarios.php?accion=modificar" ?>" class="ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all">
    <span class="ui-button-text"><img src="../images/icons_menu/x32/save1_x32.png" width="20" height="20" align="absmiddle">&nbsp;Guardar cambios</span>
    </button>
  <?php 
	$url_elim="horarios.php?accion=eliminar&id_elim=".$id;
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