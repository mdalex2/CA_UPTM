
               
<form id="form_editar" name="form_editar" action="<?php echo "usuarios.php?accion=guardar" ?>" method="post" enctype="multipart/form-data" class="uniForm">
<!-- Fieldset -->
  
<fieldset>
<legend>DATOS DEL USUARIO:</legend>

<table  width="..." border="0" align="center">
<tr>
<td colspan="3">
  
  <div class="ctrlHolder">
    <label for="txt_ced">Nº Cédula</label>
    <br>
    <input name="txt_ced" type="text" class="validate[required,custom[integer,minSize[5]] "  id="txt_ced" tabindex="0" value="" size="15" maxlength="15" />
    <input type="hidden" name="txt_id_ant" value="" />
    <p class="formHint"> (*) Ejm: 14771188</p>
    
    </div>									
</td>
</tr> 
<tr>
<td>
  
  <div class="ctrlHolder">
    <label for="txt_nom">Nombres</label>
    <br>
    <input name="txt_nom" id="txt_nom" type="text" class="validate[required,minSize[4]]"   tabindex="0" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: Pedro</p>
    
    </div>									
</td>
<td>&nbsp;</td>
<td><div class="ctrlHolder">
    <label for="txt_ape">Apellidos</label>
    <br>
    <input name="txt_ape" id="txt_ape" type="text" class="validate[required,minSize[4]]"   tabindex="0" size="30" maxlength="30" />
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
    <input name="txt_log" id="txt_log" type="text" class="validate[required]"  tabindex="0" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 0414-1234567</p>
    
    </div></td>
  <td colspan="2"><div class="ctrlHolder">
    <label for="txt_pwd">Paswword</label>
    <br>
    <input name="txt_pwd" id="txt_pwd" type="password" class="validate[required]"  tabindex="0" size="30" maxlength="30" />
    <p class="formHint"> (*) Ejm: 0414-1234567</p>
    
    </div></td>
</tr>
<tr>
  <td colspan="4"><div class="ctrlHolder">
    <label for="txt_pri">Privilegio</label>
    <br>
    <select name="txt_pri" id="txt_pri" class="cssf validate[required]" size="1">
      <option value="A" >Administrador</option>
      <option value="U" >Usuario</option> 
      </select>
    <p class="formHint"> (*) Seleccione</p>
    
    </div></td>
</tr>
<tr><td colspan="3">
  <button type="submit" formaction="<?php echo "usuarios.php?accion=guardar" ?>" class="ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all">
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
