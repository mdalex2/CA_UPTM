<!DOCTYPE HTML>
<html>
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; 
charset=<?php echo $_SESSION['juego_caracteres'];//esta variable se declara en modulo verificar login?>">
</head>
<!-- PARA BUSCAR-->    
                  
<form id="form_buscar" name="form_buscar" action="<?php echo "reporte_mes.php" ?>" target="_blank" method="post" enctype="multipart/form-data" class="uniForm">
<fieldset>
<legend>Buscar:</legend>
<table align="center" width="100%">
<tr>
<td width="185">
<div class="ctrlHolder">
<?php
include_once("../funciones/primer_ultimo_dia_mes.php");
$dias = new Dias();
aplica_conf_global();
$fecha= date("Y-m-d");
$fecha_ini=$dias->primerDiaMes($fecha);
$fecha_fin=$dias->ultimoDiaMes($fecha);

?>
  <label for="txt_desde" id="lbl_text_busc">Desde</label>
  <br>
  <input name="txt_desde" type="text" class="validate[required,custom[date]] text-input sf"  id="txt_desde" tabindex="0" value="<?php if (isset($fecha_ini)){ echo $fecha_ini;}?>" maxlength="20" autofocus/>
  <input type="hidden" id="lbl_text_busc1" name="lbl_text_busc1" value="<?php if (isset($_POST["lbl_text_busc1"])) echo $_POST["lbl_text_busc1"]; else echo " Escriba el texto a buscar"; ?>">
  <p class="formHint"> (*) Requerido </p>
</div></td>
<td width="220">
<div class="ctrlHolder">

  <label for="txt_desde" id="lbl_text_busc">Hasta</label><br>
  <input name="txt_hasta" type="text" class="validate[required,custom[date]] text-input sf"  id="txt_hasta" tabindex="0" value="<?php if (isset($fecha_fin)){ echo $fecha_fin;}?>" maxlength="20" autofocus/>
  <input type="hidden" id="lbl_text_busc1" name="lbl_text_busc1" value="<?php if (isset($_POST["lbl_text_busc1"])) echo $_POST["lbl_text_busc1"]; else echo " Escriba el texto a buscar"; ?>">
  <p class="formHint"> (*) Requerido </p>
</div>
</td>
<td width="85">  
<button formaction="<?php echo "reporte_mes.php" ?>"  formtarget="_blank" class="ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all" type="submit">
<span class="ui-button-text"><img src="../images/icons_menu/x32/find_x32.png" width="20" height="20" align="absmiddle">&nbsp;Buscar</span>
</button> 
</td>
</tr>
</table>   
</fieldset>            
</form>
</legend>
<!-- FIN DE BUSCAR-->		
</html>