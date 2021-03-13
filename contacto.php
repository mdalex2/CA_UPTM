<?php
include_once("funciones/funciones.php");
session_cache_limiter('nocache,private'); //evita mensaje de sesion expirada al presionar atras en el navegador

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema para Control de Asistencia - UPTMKR</title>
<link href="style_login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="topPan">
  <div id="topHeaderPan">
  
 
  	<ul>
		Universidad Politecnica Territorial de  Mérida<br />
        Kleber Ramírez

	</ul>
	</div>
<div id="toprightPan">
	<ul>
		<li class="home">Inicio</li>
		<li class="about"><a href="acerca.php">A cerca de...</a></li>
		<li class="contact"><a href="contacto.php">Contacto</a></li>
	</ul>
</div>
</div>

<div id="bodyPan">
  <div id="bodyleftPan">
  	<h2>Contacto</h2>
	<p class="greentext">Email:</p>
	<p class="browntext">su e-mail aqui</p>
	<p>Para acceder al sistema ingrese su nombre de usuario y clave de acceso</p>
    <!--
	<ul>
		<li class="more"><a href="#"></a></li>
		<li class="comment"></li>
	</ul>
    -->
	<h3>&nbsp;</h3>
  </div>
  
  <div id="bodyrightPan">
    <div id="loginPan">
		<h2>Acceso <span>usuarios</span></h2>
		<form action="funciones/verifica_login.php" method="post">
		<label>Login</label><input name="usuario" type="text" id="usuario" />
		<label>Password</label><input name="clave" type="password" id="clave" />
		<input name="Input" type="submit" class="button" value="Entrar" />
        <br />
        
		</form>
		<ul>
			<li class="nonregister"></li>
			<li class="register"><a href="#"></a> </li>
		</ul>
        
        <center>
		<?php 
		if (!empty($_REQUEST["err"])){
			$error=$_REQUEST["err"];
		} else {
			$error="0";
		}
		switch ($error){
			case 1:
			echo '<p style="color:#F00">Error en nombre de susuario o clave de acceso</p>';
			break;
			case 2:
			echo '<p style="color:#F00">Acceso denegado, debe iniciar sesión correctamente</p>';
			break;
		}
		
		?>
        </center>
        
	</div>
	<div id="loginBottomPan">&nbsp;</div>
	
   
	
   
  </div>
</div>
<div id="footermainPan">
  <div id="footerPan">
  <!--
  	<div id="footerlogoPan"><a href="index.html"><img src="images/footerlogo.gif" title="Blog Division" alt="Blog Division" width="189" height="87" border="0" /></a></div>-->
	<ul>
  	<li><a href="index.php">Inicio</a>| </li>
  	<li><a href="acerca.php">A cerca de...</a> | </li>
	<li><a href="contacto.php">Contacto</a> </li>
	</ul>
	<p class="copyright">Copyright © UPTM</p>
	<ul class="templateworld">
  </ul>
	<ul class="validation">
  </ul>
  </div>
</div>
</body>
</html>
