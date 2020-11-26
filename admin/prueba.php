<?php require_once('../conexion/conexion.php'); ?>
<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	if(isset($_POST['save'])){
			
			
			$user1 = $_POST['user'];
			

			$sql = "SELECT * FROM usuarios WHERE usuario='$user1'";
			//echo $sql;
			$resultado1 = $mysqli->query($sql);		
			$num = $resultado1->num_rows;

			if($num>0){
				
					/*echo "<script>";
	  				echo "myFunction();";
					echo "</script>";*/					 							


				} else {
						$usuario1 = $_POST['user'];
						$password1  = $_POST['password'];
						$nombre1 = $_POST['nombre'];
						$tipo_usuario1  = $_POST['tipo_usuario'];
						

						$sql        = "INSERT INTO usuarios(usuario,password,nombre,tipo_usuario)
						VALUES ('$usuario1','$password1','$nombre1','$tipo_usuario1')";

						if (mysqli_query($mysqli, $sql))
						{
							$sucess = "Insert has been successfully.!"; 
						}
						else
						{
					 echo "Error: " . $sql . "
						" . mysqli_error($mysqli);
					 }
				}
		
		
			
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<h1>Agregar Usuario</h1>
						<form class="mt33" action="" method = "post"><!--form -->

								<!-- First name -->
								<div class="form-group row">
									<label for="description" class="control-label col-sm-3">Usuario:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="user" name="user" placeholder="intoducir nombre de usuario" required>
									</div>
								</div>

								  <!-- last name -->
								  <div class="form-group row">
									<label for="description" class="control-label col-sm-3">Contraseña:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="password" name="password" placeholder="introducir Contraseña" required>
									</div>
								</div>

								<!-- City name  -->
								
								  <div class="form-group row">
										<label for="description" class="control-label col-sm-3">Nombre:</label>
										<div class="col-sm-9">
										<input type="text" class="form-control" id="nombre" name="nombre" placeholder="introducir nombre" required>
										</div>
									</div>
								  <!-- Email -->
								  <div class="form-group row">
									<label for="description" class="control-label col-sm-3">Tipo de usuario:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="tipo_usuario" name="tipo_usuario" placeholder="introducir tipo de usuario" required>
									</div>
								</div>


								<!-- Show Message -->
								<div class="text-success text-center d-none" id="msg_div">
									<h4 id="res_message">Insert has been successfully.</h4>
									 
								</div>

								<!-- btn insert data -->
								<div class="form-group row">
									<div class="offset-sm-3 col-sm-9 pull-right">
										<button type="submit"id="save" name="save" class="btn btn-primary">Guardar</button>
									</div>
								</div>
            			</form>
</body>
</html>