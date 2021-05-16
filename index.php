<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8"/>
		<meta name="description" content="Proyecto">
	  <meta name="keywords" content="HTML5, CSS3, JavaScript">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Iniciar sesion</title>
	</head>
	<body>
    <?php include_once("cabecera.html");
		      include_once("login.php");?>

<div align="center">
    <section>
      <figure class="logo">
        <img  class="logo" src="img/logo_inicio.jpg"/>
        <br><br>
      </figure>
			<form  method="post" action="">
			  <input type="text" name="usuario" placeholder="Usuario">
				<br/><br>

				<input type="password" name="password" placeholder="Contraseña">
				<br/><br>
        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
          <br><input type="submit" value="Iniciar sesion">
			</form>
		</section>
</div>
<?php
include_once("pie.html");
?>
</body>
</html>
