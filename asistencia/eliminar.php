<?php
function eliminar_datos(){
if (!isset($_GET["id_elim"])){
	mostrar_box("err",false,"FALTAN DATOS","No se ha recibido la cédula a eliminar. ");
} else {
	$id_elim=$_GET["id_elim"];
	$sql_elim="delete from horarios where horarios_id='$id_elim'";
	$conexion=conectarse();
	$consulta=mysql_query($sql_elim);
	if (!$consulta){
		$error=obtener_error(mysql_errno());
		mostrar_box("err",true,"INFORMACION","No se pudo eliminar el horario: ".$error);	
		echo mostrar_btn_imp_reg();
		} else {
			$url_redirec="horarios.php?accion=buscar";
			if (mysql_affected_rows()>0){		
			mostrar_box("suc",false,"RESULTADO DE LA ELIMINACI&Oacute;N","El horario se elimin&oacute; correctamente, para buscar otro espere 5 segundos para redireccionar autom&aacute;ticamente al men&uacute; de b&uacute;squeda.<br><br> <a href='$url_redirec' class=\"boton\" >Si no se dirige automáticamente haga clic aqu&iacute;</a><br>");
			} else {
				mostrar_box("exc",false,"RESULTADO","No se encontr&oacute; el horario para eliminar, si desea buscar otro espere 5 segundos para redireccionar autom&aacuteticamente; al men&uacute; de b&uacute;squeda <br><br><a href='$url_redirec' class=\"boton\" >Si no se dirige automáticamente haga clic aqu&iacute;</a><br>");
			}
			
echo '<script language="JavaScript" type="text/javascript">

var pagina="'.$url_redirec.'"
function redireccionar() 
{
window.parent.location.href=pagina
} 
setTimeout ("redireccionar()", 5000);

</script>';
//exit();
	}
}
}
?>