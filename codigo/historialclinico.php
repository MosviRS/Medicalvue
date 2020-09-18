<?php

session_start();
$sessionofuser =(empty($_SESSION['name'])) ? NULL : $_SESSION['name'];
if(!isset($sessionofuser)){
	//session_start();
    header("location:loginmedicos.php");
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Historial Clinico</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/historialclin.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="manifest" href="json/manifest.json">
    </head>

    <header>
		<div class="wrapper">
			<h2 class="logo" ><img src="IMG/medifastlogo.png" alt="medicalvue" width="200" height="98"></h2>
			
		</div>
	</header>
	<body>
		<!--Contenedor-->
		 
		<div id="general">
			
				<form method="POST"  action="verif_register.php" id="formregistro" >
					<h2 id="titulo" >Historial Clinico</h2>
				  <div class="froms">
                       <div class="contains">
					   <div class="f1">
							<div class ="f2">
								<label for="name">Enfermedad Cronica</label>
							</div>
							<input type="text" name="enferemdad" placeholder="Enfermedad Cronica" required autofocus>
					    </div>
						<div class="f1">
							<div  class ="f2">
								<label for="surname">Consumo de Drogas</label>
							</div>
							
							<input type="text" name="consumo 
							drogas" placeholder="Consumo de Drogas" required autofocus>
						</div>
					</div>
					    
                      <div class="contains">
						<div class="f1">
							<div class="f2">
								<label for="email">Alergias</label>
							</div>
							
							<input type="text" name="alergias" placeholder="Alergias"  required autofocus>
						</div>
						<div class="f1">
							<div class="f2">
								<label for="email">Tipo de Sangre</label>
							</div>
							
							<input type="text" name="sangre" placeholder="Sangre" required autofocus>
						</div>
						<div class="f1" style="width: 328px;">
							<div class="f2">
								<label for="contrasena" >Operaciones</label>
							</div>
							
							<input type="text" name="contrasena" placeholder="Operaciones" required>
							</div>
							
						</div>
						<div class="contains">
							<div class="f1">
										<div class="f2">
										<button colspan="1" type="submit"  id="button1" >Guardar Datos</button>
										</div>
										
									</div>
									<div class="f1">
										<div class="f2">
										 <a href='datos_medicos.php' colspan="1" type="button"  id="button2" >Cancelar</a>
										</div>	
								
									</div>
							</div>	 
							
					 </div>
				</form>
			
		</div>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
			integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
		</script>
		<script src="//malihu.github.io/custom-scrollbar/jquery.
		mCustomScrollbar.concat.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/7edcc08e48.js" crossorigin="anonymous"></script>
		<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " > </script> 
		<script src = "librerias/sweetalert.min.js"></script> 
		<script src="JS/sinitize.js" type="text/javascript"></script>
	</body>
</html>