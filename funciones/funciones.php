<?php
function conectarse(){
include('../adodb/adodb.inc.php');
$db = NewADOConnection('mysql');
$db->Connect("127.0.0.1","root","1234","control_de_asistencias");
return $db;
}
//esta funcion ejecuta consultas sql y devuelve los registro si los hay si no se sale
function ejecuta_sql($consulta,$mostrar_msg){
		conectarse();	
		mysql_query("SET NAMES 'utf8'");
		$registros=mysql_query($consulta);
		if(!$registros){
			mostrar_box("err",true,"INFORMACIÓN","No se pudo ejecutar la consulta SQL: ".mysql_error());
				return false;}
		else
			if (mysql_num_rows($registros)==0 ){
				if ($mostrar_msg==true){
				//echo $mostrar_msg;
				echo mostrar_box("inf",true,"RESULTADO DE LA CONSULTA","No se han encontrado registros");}
				else
				return false;
			} else {
				return $registros;
				mysql_close();
				}
}
//----------------------------------------------------------
function crear_menu_usuario($id_niv_acceso){
switch ($id_niv_acceso) {
	
	case 'A': #menu administrador
		$menu='<ul>
			    <li>
			    	<a href="../menu_principal/menu_principal.php" class="active"><span>Inicio</span></a>
			    	
			    </li>
				
				
			    <li>
			    	<a href="#"><span>Opciones</span></a>
			    	<ul>
			    		<li><a href="../usuarios/usuarios.php">Usuarios</a></li>
			    		<li><a href="../horarios/horarios.php">Horarios</a></li>

						
			    	</ul>
			    </li>
				
				<li>
			    	<a href="#"><span>Personal</span></a>
			    	<ul>
			    		<li><a href="../personal/personal.php?accion=buscar">Datos del personal</a></li>
			    		
			    	</ul>
			    </li>
				<li>
			    	<a href="#"><span>Reportes</span></a>
			    	<ul>
			    		<li><a href="../asistencia/reporte.php" target="_blank">Listado de asistencia mensual</a></li>
			    		<li><a href="../asistencia/asistencia.php?accion=listado_inasistencia">Listado de inasistencia</a></li>
<li><a href="../personal/reporte.php" target="_blank">Listado del personal</a></li>						
						
			    	</ul>
			    </li>
				
				<li>
			    	<a href="../funciones/cerrar_sesion.php"><span>Cerrar sesión</span></a>
			    </li>

			</ul>';
			break;
	case 'U': #menu usuario
$menu='<ul>
			    <li>
			    	<a href="../menu_principal/menu_principal.php" class="active"><span>Inicio</span></a>
			    	
			    </li>
				<li>
			    	<a href="#"><span>Consultas</span></a>
			    	<ul>
			    		<li><a href="../asistencia/asistencia.php?accion=consulta_individual">Consulta de asistencia</a></li>						
			    	</ul>
			    </li>
				
				<li>
			    	<a href="../funciones/cerrar_sesion.php"><span>Cerrar sesión</span></a>
			    </li>

			</ul>';
			break;}
return $menu;
}
#----------------------------------------------------
function crear_pie_pag(){
	$pie='
			<p class="right">&copy; 2013 - UPTM</p>
		<p><a href="../menu_principal/menu_principal.php">Inicio</a><a href="../funciones/cerrar_sesion.php">Cerrar sesión</a></p>
		<div class="cl">&nbsp;</div>
';
return $pie;
}

#==================================================
function verifica_inicio_web(){
//verifico si inicio el login correctamente
if (!isset($_SESSION["logueado"]) or empty($_SESSION["logueado"]) or ($_SESSION["logueado"]!=true)){
	header("location:../index.php?err=2");
	exit();
}
}
//----------------------------------------------------------------------
function fecha_actual($formato){
	aplica_conf_global();
	switch ($formato){
		case "normal":
			$fecha_g=date("d-m-Y h:i");
			break;
		case "mysql":
			$fecha_g=date("Y-m-d H:i:s");
			break;
	}
	return $fecha_g;
}
function formato_fecha($formato,$fecha){
	aplica_conf_global();
	$fecha_g=strtotime($fecha);
	switch (strtoupper($formato)) {
				case "H12":
		//21/12/2012 11:00 pm
			$fecha_g=strftime("%I:%M %p",strtotime($fecha)); 
			break;
		case "H12S": //hora 12 con segundos
		//21/12/2012 11:00 pm
			$fecha_g=strftime("%I:%M:%S %p",strtotime($fecha)); 
			break;
			

		case "C":
		//21/12/2012
			$fecha_g=strftime("%d/%m/%Y", strtotime($fecha));
			break;
		case "CH":
		//21/12/2012 11:00 pm
			$fecha_g=strftime("%d/%m/%Y-%I:%M %p",strtotime($fecha)); 
			break;
		case "M":
			$fecha_g=strftime("%d/%b/%Y",strtotime($fecha));
			break;
		case "MH":
			$fecha_g=strftime("%d/%b/%Y-%I:%M %p",strtotime($fecha)); 
			break;
		case "L":
			$fecha_g=strftime("%A, %d de %B de %Y",strtotime($fecha)); 
			break;
		case "LH": //larga hora
		  //$fecha_g=date('l jS \of F Y h:i:s A',strtotime($fecha));
			$fecha_g=strftime("%A, %d de %B de %Y - %I:%M %p",strtotime($fecha)); 
			break;
		case "MA": 
		  //mes y año letra
			$fecha_g=strftime("%B-%Y",strtotime($fecha)); 
			break;
		case "MES":
		  //mes y año letra
			$fecha_g=strftime("%B",strtotime($fecha)); 
			break;
			

	} //fin switch
	return utf8_encode($fecha_g);
} //fin de la funcion

function aplica_conf_global(){
	// asigna las configuraciones gloables a las paginas
session_cache_limiter('nocache,private'); //evita mensaje de sesion expirada al presionar atras en el navegador
//ASIGNO LO CONFIGURACION DE MANIPULACION DE FECHAS A ESPAÑOL
date_default_timezone_set("America/Caracas");
	setlocale(LC_ALL,'es_VE', 'es_VE.utf-8',"es_Es",''); //pongo la traduccion de fecha a español
	//setlocale(LC_ALL,"spanish");

}

//convertir textos  mayusculoas minusculas etc------------------------------------------------
function trans_texto($str,$tipo){
	switch ($tipo) {
	case "TI":
		$str=mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
		break;
	case "MA":
		$str = mb_convert_case($str, MB_CASE_UPPER, "UTF-8");
		break;
	case "MI";
		$str = mb_strtolower($str);
		break;
	}
	return $str;
}

//esta funcion muetra mensajes tipo BOX o de caja en la pagina web 
	function mostrar_box($tipo,$permite_ocultar,$titulo,$mensaje) {
		switch (strtoupper($tipo)){
			case "ERR":
			  if ($permite_ocultar==true){
			    echo '<div class="message error_msg close">';}
			  else{
			    echo '<div class="message error_msg">';}
			    echo '<h2><b>'.$titulo.'</b></h2>
					<p>'.$mensaje.'</p>
				  </div>';
				  break;			

			case "INF":
			  if ($permite_ocultar==true){
			    echo '<div class="message information close">';}
			  else{
			    echo '<div class="message information">';}
			    echo '<h2><b>'.$titulo.'</b></h2>
					<p>'.$mensaje.'</p>
				  </div>';
				  break;			
			case "EXC":
			 if ($permite_ocultar==true){
		       echo '<div class="message warning close">';}
			 else{
			   echo '<div class="message warning">';}
			   echo '<h2><b>'.$titulo.'</b></h2>
					<p>'.$mensaje.'</p>
				  </div>';
				  break;			
			case "SUC":
			 if ($permite_ocultar==true){
		       echo '<div class="message success close">';}
			 else{
			   echo '<div class="message success">';}
			   echo '<h2><b>'.$titulo.'</b></h2>
					<p>'.$mensaje.'</p>
				  </div>';
				  break;			
			
			} //fin fuction box
		} //fin switch

//-----------------------------------------------------
function mostrar_btn_imp_reg(){
	$botones= '<hr><div align="right">
<button class="boton"  onClick="window.print();">
<span class="ui-button-text"><img src="../images/icons_menu/x32/printer2_x32.png" width="20" height="20" align="absmiddle"> Imprimir</span>
</button>

<button class="boton"  onClick="javascript:history.back(1)">
<span class="ui-button-text"><img src="../images/icons_menu/x32/atras_azul.png" width="20" height="20" align="absmiddle"> Ir atrás</span>
</button>
</div>';
return $botones;
}

?>
