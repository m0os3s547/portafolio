<?php

		// $ultimoArray=count($nomina)-2; 
		// $ultimoID=$nomina[$ultimoArray][0];
		




		
		function cargarList(){
		$f = fopen("nomina.csv", "r");
		while (!feof($f)) {
			$nomina[] = explode(",", fgets($f) );
		}
		for ($i=0; $i<count($nomina)-1; $i++) {

			echo "".$nomina[$i][0]." - ".$nomina[$i][1]." - ".$nomina[$i][2]." - ".$nomina[$i][3]." - ".$nomina[$i][4]." - ".$nomina[$i][5]."<br/>";
		}
		fclose($f);
	}


	function addNomina($nombre,$apellido,$usuario,$email,$password){
		$f = fopen("nomina.csv", "r+");
		while (!feof($f)) {
			$usuarioList[] = explode(",", fgets($f) );
		}

		$ultimoArray=count($usuarioList)-2; 
		$ultimoID=$usuarioList[$ultimoArray][0];
		
		for ($i=0; $i<count($usuarioList)-1; $i++) {
			if ($usuarioList[$i][1] == $nombre ){
				return 1;
			}
		}
	
		$ultimoUser=($ultimoID+1).",".$nombre.",".$apellido.",".$usuario.",".$email.",".$password.",".PHP_EOL;
		fwrite($f,$ultimoUser);
		
		fclose($f);
		return 0;
	}

	if(isset($_POST['btnSubmit'])){
							addNomina($_POST['txtapellido'],$_POST['txtnombre'],$_POST['txtanionac'],$_POST['txtlocalidad'],$_POST['txtprovincia']);
							header('location: nomina.php');


	}		
					

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div class="lista">
		<?php
		cargarList();
		?>
	</div>

	<h1>Registro de nuevos alumnos </h1>
	<form action="" method="POST">
		<label>Apellido:</label><br>
		<input type="text" name="txtapellido" required><br>
		
		<label>Nombre:</label><br>
		<input type="text" name="txtnombre" required=""><br>

		<label>Año de nacimiento:</label><br>
		<input type="text" name="txtanionac" required><br>

		<label>Localidad:</label><br>
		<input type="text" name="txtlocalidad" required><br>

		<label>Provincia:</label><br>
		<input type="text" name="txtprovincia" required><br>
		
		<input type="submit" name="btnSubmit" value="Registrarme">
	</form>

</body>
</html>	