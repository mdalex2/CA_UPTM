
               
<form id="form_editar" name="form_editar" action="<?php echo "horarios.php?accion=guardar" ?>" method="post" enctype="multipart/form-data" class="uniForm">
<!-- Fieldset -->
  
<fieldset>
<legend>DATOS DEL HORARIO:</legend>

<table  width="..." border="0" align="center">
<tr>
  <td colspan="3">
    
    <div class="ctrlHolder">
      <p>
        <label for="txt_ced">Nº Cédula</label>
        <br>
        <input name="txt_ced" type="text" class="validate[required,custom[integer,minSize[5]] "  id="txt_ced" tabindex="0" size="15" maxlength="15" />
        <input type="hidden" name="txt_id_ant" value="" />
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
    <input name="txt_he" id="txt_he" type="text" class="validate[required,minSize[4]]"   tabindex="0" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 08:00:00</p>
    
    </div>									
</td>
<td>&nbsp;</td>
<td><div class="ctrlHolder">
    <label for="txt_hn">Hora salida</label>
    <br>
    <input name="txt_hs" id="txt_hs" type="text" class="validate[required,minSize[4]]"   tabindex="0" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 10:00:00</p>
    
    </div></td>
</tr>
<tr>
<td>
  
  <div class="ctrlHolder">
    <label for="txt_hd">Hora diurnas</label>
    <br>
    <input name="txt_hd" id="txt_hd" type="text" class="validate[required,minSize[1],custom[integer]]"   tabindex="0" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 08:00:00</p>
    
    </div>									
</td>
<td>&nbsp;</td>
<td><div class="ctrlHolder">
    <label for="txt_hn">Hora nocturnas</label>
    <br>
    <input name="txt_hn" id="txt_hn" type="text" class="validate[required,minSize[1],custom[integer]]"   tabindex="0" size="30" maxlength="30" />
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
      <option value="M" >MAÑANA</option>
      <option value="T" >TARDE</option> 
      <option value="N" >NOCHE</option> 
      <option value="D" >DIA</option> 
      </select>
    <p class="formHint"> (*) Seleccione</p>
    
    </div></td>
  <td colspan="2">&nbsp;</td>
</tr>
<tr><td colspan="3">
  <button type="submit" formaction="<?php echo "horarios.php?accion=guardar" ?>" class="ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all">
    <span class="ui-button-text"><img src="../images/icons_menu/x32/save1_x32.png" width="20" height="20" align="absmiddle">&nbsp;Guardar cambios</span>
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
