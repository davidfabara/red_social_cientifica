<?php 

require('funciones.php');
require('clases/clases.php');


$error = "";
if(isset($_POST['registrar']))
{
	$pass = hash('sha512', $_POST['pass']); /* La funcion hash sirve para encriptar un valor pasado como argumento en este caso la contraseña pass , el primer parametro es el algoritmo sha512, convierte el argumento pasado en un string de 128 caracteres*/
	
	$datos= array( //se inicializa la variable datos como un array de los datos de entrada del formulario
			$_POST['nombre'],
			$_POST['usuario'],
			$pass, // recordar que pass se cifró con hash
			$_POST['pais'],
			$_POST['profe'],
			$_POST['discapacidad']

		);
	
	if(datos_vacios($datos) == false)
	{
	/*$datos = limpiar($datos); TODO: Esta linea TODO: NO  TODO:forma parte del codigo original mas si del video es para asegurarse de que no exista caracteres de html,espacios en blanco,barras investidas para pulir aun mas los $datos */
		if(!strpos($datos[1], " ")) /*strpos, permite saber si un caracter como argumento esta presente dentro de algun String dado , $datos[1] implica a el usuario  y queremos controlar que NO tenga espacios en blanco  con el argumento " " por ello !strpos */
		{
			if(empty(usuarios::verificar($datos[1]))) /* Se envia $_POST['nombre'] a la funcion verificar de la clase usuarios para verificar si existe o no el ususario*/
			{
				usuarios::registrar($datos); /*llamamos a la funcion registrar que esta dentro de clase usuarios */
			}
			else{
				$error .= "usuario existente";
			}
		}
		else
		{
			$error .= "usuario con espacios";
		}
	}else{
		$error .= "Hay campos vacios";
	}
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="css/login.css">
	<?php /*Notar que usamos los mismos estilos en login.php asi lo queremos*/ ?>
</head>
<body>
	<div class="contenedor-form">
		<h1>Registrar</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<p id="discapacidad">Discapacidad Visual </p>
			<select name="discapacidad" id="" class="input-control">
				<option  class="opcion">Sin discapacidad</option>
				<option  class="opcion">Discapacidad moderada</option>
				<option  class="opcion">Discapacidad grave o ciega</option>
			</select><br>

			<input type="text" name="nombre" class="input-control" placeholder="Nombre">
			<input type="text" name="usuario" class="input-control" placeholder="Usuario">
			<input type="password" name="pass" class="input-control" placeholder="Password">
			<input type="text" class="input-control" name="pais" class="input-control" placeholder="Pais">
			<input type="text" class="input-control" name="profe" class="input-control" placeholder="Profesion">
			
			
			<input type="submit" value="Registrar" name="registrar" class="log-btn" >
		</form>
		<?php if(!empty($error)): ?>
			<p class="error"><?php echo $error ?></p>
		<?php endif;?> 
		<?php
		/*
		La class=error permite invocar los estilos en el archivo login.css para color rojo en :  .contenedor-form .error{, recordar que .contenedor-form implica a todo el formulario de registro y tambien si el $error no esta vacio(porque el usuario cometio un error en el registro), entonces si no ha cometido tal error, NO SE CARGARA ese parrafo en codigo html sobre la interfaz en pantalla
		*/ 
		?>
		<div class="registrar">
			<a href="login.php">Tienes cuenta?</a>
		</div>
	</div>
</body>
</html>