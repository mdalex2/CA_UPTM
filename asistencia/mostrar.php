
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
</fieldset>
<!-- End of fieldset -->
</form> 
<?php
  } //cierro si se encontro la consulta y si no hubo error
	}  //cierro si se envio por url el id a mostrar
?>