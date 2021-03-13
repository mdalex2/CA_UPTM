<?php
	session_start();
if (isset($_SESSION['logueado'])){
	session_destroy();
	unset($_SESSION['logueado']);
	header("location:../index.php");
	}
	else 
	{
		header("location:../index.php");
		echo "no se ha definido la sesion";
	}

?>