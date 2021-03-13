<?php
session_cache_limiter('nocache,private'); //evita mensaje de sesion expirada al presionar atras en el navegador

session_start();
include_once("../funciones/funciones.php");
echo verifica_inicio_web();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=<?php if (isset($_SESSION['juego_caracteres'])){ echo $_SESSION['juego_caracteres'];} else echo "utf-8";//esta variable se declara en modulo verificar login?>" />
	<title><?php echo $_SESSION["nom_sis"]." - ".$_SESSION["nom_sis_cor"]." ".$_SESSION["sis_ver"];?></title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<script src="../js/jquery-1.4.1.min.js" type="text/javascript"></script>
	<script src="../js/jquery.jcarousel.pack.js" type="text/javascript"></script>
	<script src="../js/jquery-func.js" type="text/javascript"></script>
</head>
<body>
<div id="page" class="shell">
	<!-- Logo + Search + Navigation -->
	<div id="top">
		<div class="cl">&nbsp;<center><img src="../images/barra_me3.png" width="870px" height="55" /></center></div>
		<!--<h1 id="logo"><a href="#">MONDAYS</a></h1>-->
        <br /><br />
		<div class="cl">&nbsp;</div>
		<div id="navigation">
        <?php
		echo crear_menu_usuario($_SESSION["Privilegio"]);
		?>
		</div>	
	</div>
	<!-- END Logo + Search + Navigation -->
	<!-- Header -->
	<div id="header">
		<!-- Slider -->
		<div id="slider">
			<div id="slider-holder">
				<ul>
				    <li>
				    	<div class="slide-info">
                        <!--class="notext txt-we-love-mondays"-->
                        
				    		<img src="../images/bienvenida.jpg" width="120" height="100" ALIGN="absmiddle"/><h2 >Hola <?php echo $_SESSION["nom_ape_ses"];?>&nbsp;<br />Bienvenido al Sistema</h2>
				    		<p>
                            
                            Le damos la Bienvenida al sistema, para comenzar seleccione una opción en la barra de menú de la parte superior.</p>
                            				    		
                
               		<table>
                    <tr>
                    <td><a id="resize" href="../asistencia/asistencia.php?accion=entrada" class="boton" style="font-size:10px;padding:2px; color:#000000;" width="45%" height="90%" title="Registrar Entrada" >&nbsp;
                  <img src="../images/icons_menu/x32/00056.png" width="20px" heigth="20px" align="absmiddle"></img>&nbsp;Registrar Entrada&nbsp;
              </a> </td>
                    <td>             <a id="resize" href="../asistencia/asistencia.php?accion=salida" class="boton" style="font-size:10px;padding:2px; color:#000000;" width="45%" height="90%" title="Registrar salida" >&nbsp;
                  <img src="../images/icons_menu/x32/limpiar_x32.png" width="20px" heigth="20px" align="absmiddle"></img>&nbsp;Registrar &nbsp;Salida&nbsp;
              </a></td>
                    </tr>
                    </table>
			    	  </div>
				    	<div class="slide-image">
				    		<img src="css/images/img1.gif" alt="" />
				    	</div>
				    </li>
				    <li>
				    	<div class="slide-info">
                        <img src="../images/time.jpg" width="120" height="100" align="absmiddle"/>
<h2>Recuerde!!!</h2>
				    		<p>Debe registrar su hora de entrada y salida de la institucuón para evitar deducciones en su salario</p>
				    		<a href="#" class="button-more">Más</a>
				    	</div>
				    	<div class="slide-image">
				    		<img src="css/images/img1.gif" alt="" />
				    	</div>
				    </li>
				</ul>
			</div>
			<div class="slider-nav">
				<a href="#" class="prev">Anterior</a>
				<a href="#" class="next">Siguiente</a>
			</div>
		</div>
		<!-- END Slider -->	
	</div>
	<!-- END Header -->
	<!-- Main -->
	<div id="main">
	</div>
	<!-- END Main -->
	<!-- Footer -->
	<div id="footer">
    <?php 
		echo crear_pie_pag();
	?>
	</div>
	<!-- END Footer -->
	<br />
</div>
</body>
</html>