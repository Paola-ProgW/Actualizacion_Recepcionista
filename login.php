<?php
$alert = '';

	session_start();
if(!empty($_SESSION['active']))
{
	header('location: inicio.php');
}else{
if(!empty($_POST))
{
	if(empty($_POST['usuario']) || empty($_POST['password']))
	{
		$alert = 'Falta ingresar su usuario o su contraseña';
	}else{

	//if(empty($_POST['usuario']) )
	require_once ("modelo\conexion.php");

	$user = $_POST['usuario'];
	$pass = $_POST['password'];

	$query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario ='$user' AND password ='$pass'");
	$result = mysqli_num_rows($query);

	if($result > 0)
	{
		$data = mysqli_fetch_array($query);
		$_SESSION['active'] = true;
		$_SESSION['idUser'] = $data['id_usuario'];
		$_SESSION['rol'] = $data['rol'];
		$_SESSION['User'] = $data['usuario'];

		header('location: inicio.php');
	}else{
		$alert = 'El usuario o la clave son incorrectos';
		session_destroy();
	}
	}
}
}

?>
