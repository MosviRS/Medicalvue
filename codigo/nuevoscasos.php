<?php

$sessionofuser =(empty($_SESSION['name'])) ? NULL : $_SESSION['name'];
if(!isset($sessionofuser)){	
    if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 1800)) {
		// last request was more than 30 minutes ago
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();   // destroy session data in storage
		header("location:loginmedicos.php");
	}else{
	   session_start();
	   $sessionofuser =(empty($_SESSION['name'])) ? NULL : $_SESSION['name'];
	}
	//session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>dashboard</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/dashboardstyles.css">
		<link rel="stylesheet" href="CSS/dashgeneral.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="manifest" href="json/manifest.json">
		<link rel="stylesheet" href="CSS/autocominputs.css">
    </head>


	<body translate="no" style="background-color: rgb(239, 241, 247);">
		
		<div class="page-wrapper chiller-theme toggled">
			<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
			  <i class="fas fa-bars"></i>
			</a>
			<nav id="sidebar" class="sidebar-wrapper">
			  <div class="sidebar-content">
				<div class="sidebar-brand">
				  <a href="#">pro sidebar</a>
				  <div id="close-sidebar">
					<i class="fas fa-times"></i>
				  </div>
				</div>
				<div class="sidebar-header">
				  <div class="user-pic">
					<img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
					  alt="User picture">
				  </div>
				  <div class="user-info">
					<span class="user-name"><?php 
					   ?>
					  <strong><?php echo $_SESSION['nombres'] ;?></strong>
					</span>
					<span class="user-role">Administrator</span>
					<span class="user-status">
					  <i class="fa fa-circle"></i>
					  <span>Online</span>
					</span>
				  </div>
				</div>
				<!-- sidebar-header  -->
				<div class="sidebar-search">
				  <div>
					<div class="input-group">
					  <input type="text" class="form-control search-menu" placeholder="Search...">
					  <div class="input-group-append">
						<span class="input-group-text">
						  <i class="fa fa-search" aria-hidden="true"></i>
						</span>
					  </div>
					</div>
				  </div>
				</div>
				<!-- sidebar-search  -->
				<div class="sidebar-menu">
				  <ul>
					<li class="header-menu">
					  <span>General</span>
					</li>
					<li class="sidebar-dropdown">
					  <a href="tabla_pacientes.php" onclick=>
						<i class="fas fa-user-injured"></i>
						<span>Pacientes</span>
						<span class="badge badge-pill badge-warning">New</span>
					  </a>
					  <div class="sidebar-submenu">
						<ul>
						  <li>
							<a href="#">Dashboard 1
							  <span class="badge badge-pill badge-success">Pro</span>
							</a>
						  </li>
						  <li>
							<a href="#">Dashboard 2</a>
						  </li>
						  <li>
							<a href="#">Dashboard 3</a>
						  </li>
						</ul>
					  </div>
					</li>
					<li class="sidebar-dropdown">
					  <a href="#">
						<i class="fas fa-stethoscope"></i>
						<span>Nuevo caso</span>
						<span class="badge badge-pill badge-danger">3</span>
					  </a>
					  <div class="sidebar-submenu">
						<ul>
						  <li>
							<a href="#">Productos
		  
							</a>
						  </li>
						  <li>
							<a href="#">Orders</a>
						  </li>
						  <li>
							<a href="#">Credit cart</a>
						  </li>
						</ul>
					  </div>
					</li>
					<li class="sidebar-dropdown">
					  <a href="tabla_citas.php">
						<i class="fas fa-calendar-week"></i>
						<span>Citas</span>
					  </a>
					  <div class="sidebar-submenu">
						<ul>
						  <li>
							<a href="#">General</a>
						  </li>
						  <li>
							<a href="#">Panels</a>
						  </li>
						  <li>
							<a href="#">Tables</a>
						  </li>
						  <li>
							<a href="#">Icons</a>
						  </li>
						  <li>
							<a href="#">Forms</a>
						  </li>
						</ul>
					  </div>
					</li>
					
					<li class="sidebar-dropdown">
					  <a href="tabla_medicamentos.php">
						<i class="fas fa-capsules"></i>
						<span>Medicamentos</span>
					  </a>
					  <div class="sidebar-submenu">
						<ul>
						  <li>
							<a href="#">Pie chart</a>
						  </li>
						  <li>
							<a href="#">Line chart</a>
						  </li>
						  <li>
							<a href="#">Bar chart</a>
						  </li>
						  <li>
							<a href="#">Histogram</a>
						  </li>
						</ul>
					  </div>
					</li>
					<!--
					<li class="sidebar-dropdown">
					  <a href="#">
						<i class="fa fa-globe"></i>
						<span>Medicamentos</span>
					  </a>
					  <div class="sidebar-submenu">
						<ul>
						  <li>
							<a href="#">Google maps</a>
						  </li>
						  <li>
							<a href="#">Open street map</a>
						  </li>
						</ul>
					  </div>
					</li>
					<li class="header-menu">
					  <span>Extra</span>
					</li>
					<li>
					  <a href="#">
						<i class="fa fa-book"></i>
						<span>Documentation</span>
						<span class="badge badge-pill badge-primary">Beta</span>
					  </a>
					</li>
					<li>
					  <a href="#">
						<i class="fa fa-calendar"></i>
						<span>Calendar</span>
					  </a>
					</li>
					<li>
					  <a href="#">
						<i class="fa fa-folder"></i>
						<span>Examples</span>
					  </a>
					</li>
				-->
				  </ul>
				</div>
				<!-- sidebar-menu  -->
			  </div>
			  <!-- sidebar-content  -->
			  <div class="sidebar-footer">
				<a href="#">
				  <i class="fa fa-bell"></i>
				  <span class="badge badge-pill badge-warning notification">3</span>
				</a>
				<a href="#">
				  <i class="fa fa-envelope"></i>
				  <span class="badge badge-pill badge-success notification">7</span>
				</a>
				<a href="datos_medicos.php">
				  <i class="fa fa-cog"></i>
				  <span class="badge-sonar"></span>
				</a>
				<a href="logout.php">
				  <i class="fa fa-power-off"></i>
				</a>
			  </div>
			</nav>
			<!-- sidebar-wrapper  -->
			
			<main class="page-content">
				
				<header class="headr">
					<div class="wrapper">
						<h2 class="logo" ><img src="IMG/medifastlogo.png" alt="medicalvue" width="200" height="98"></h2>
						
						<nav>
							<a href="#">Iniciar sesion</a>
							
						</nav>
					</div>
				</header> 
			  <div class="container-fluid">
				<!--<h2>Nuevo Caso</h2>-->
				<hr>
				<div class="row">
				  <div class="form-group col-md-12">
					<!--<p>Aqui van los formularios de nuevos casos.</p>
					 <p> You can find the complete code on <a href="https://github.com/azouaoui-med/pro-sidebar-template" target="_blank">
						Github</a>, it contains more themes and background image option</p> -->
                  </div>

                  <div id="general">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nuevo Caso</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Preinscripcion</a>
											</li>	
											<li class="nav-item">
												<a class="nav-link" id="report-tab" data-toggle="tab" href="#report" role="tab" aria-controls="report" aria-selected="false">Reporte</a>
											</li>	
							</ul>
                       
						  <div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<form action=""  method="POST" id="formdatos_casos" >
									<h2 id="titulo" >Nuevo Caso</h2>
									<div class="froms">
									           <input name="idpaciente" type="hidden" class="form-control" id="idpaci" placeholder="ID" required autofocus>
											   
											
										       <div class="form-row">
													<div class="col-md-4 mb-3">
													<label for="validationDefault01">Nombre(s)</label>
													<input type="text" name="nombre" class="form-control" id="nombrepaci" placeholder="Nombre(s)" autocomplete="off"  required autofocus>
													</div>


													<div class="col-md-4 mb-3">
														<label for="born">Fecha de consulta</label>
															<input type="date" name="fecha" class="form-control" id="fecha_consulta" placeholder="fecha_consulta" required autofocus>
													</div>
												</div>
																		
											</div>
													<div class="form-row">
														<div class="col-md-3 mb-3">
														<label for="validationDefault04">Alergias</label>
														<input type="text" name="alergias"class="form-control" id="alergias" placeholder="Alergias" required autofocus>
														</div>
														<div class="col-md-1 mb-3">
														<label for="validationDefault05">Estatura</label>
														<input type="text" name="estatura" class="form-control" id="estatura" placeholder="Estatura" onkeypress="return autonum(event)" required autofocus>
														</div>
														<div class="col-md-1 mb-3">
														<label for="validationDefault05">Peso</label>
														<input type="text" name="peso" class="form-control" id="peso" placeholder="Peso"  onkeypress=" return autonum(event)" required autofocus>
														</div>	
														<div class="col-md-1 mb-3">
														<label for="validationDefault04">Temperatura</label>
														<input type="text" name="temperatura" class="form-control" id="temperatura" placeholder="Temperatura" required autofocus>
													</div>		
						                       </div>	
													
									<button colspan="1" type="submit"  id="boton1" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" >Siguiente</button>
								</form>
							</div>
							
							
								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<form action=""  method="POST" id="form_prec">
								<h2 id="titulo" >Preinscripcion</h2>
									<div class="froms">
										<div class="form-group">
											<div class="form-group">
													<label for="TextAreaEnfermedad">Motivo de consulta</label>
													<textarea class="form-control" name="motivo" id="motivo" rows="2"></textarea>
											</div>
											<div class="form-group">
													<label for="TextAreaEnfermedad">Enfermedad/Padeciemintos que presenta</label>
													<textarea class="form-control" name="Enfermedad" id="Enfermedad" rows="2"></textarea>
											</div>
												<div class="form-group">
													<label for="TextAreaReceta">Receta Médica</label>
													<textarea class="form-control" name="Receta" id="Receta" rows="4"></textarea>
												</div>
												<div class="form-group">
													<label for="TextAreaIndicaciones">Indicaciones Médicas</label>
													<textarea class="form-control" name="IndicacionesMedicas" id="IndicacionesMedicas" rows="3"></textarea>
												</div>
											</div>
									</div>
									<button colspan="1" type="button"  id="boton2" onclick="
										let datos=['entidades/PDFcaso.php','#formdatos_casos','#form_prec'];
										GenerarPDf(datos);">Guardar receta</button>
								   </form>
                                </div>

								<div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">
								<form action="entidades/FPDFreport.php"  method="POST" id="form_report">
								<h2 id="titulo" >Reportes</h2>
									<div class="froms">
									<div class="form-group">
													<label for="TextAreaEnfermedad"><strong>Selecciona el rango de fechas para generar el reporte de consultas</strong></label>
										
									</div>
										<div class="form-row">
										               
														<div class="col-md-4 mb-3">
														<label for="validationDefault01">Fecha Inicial</label>
														<input type="date" name="fecha_inicial" class="form-control" id="fecha_inicial" placeholder="fecha_consulta" required autofocus>
														</div>
														<div class="col-md-4 mb-3">
															<label for="born">Fecha Final</label>
																<input type="date" name="fecha_final" class="form-control" id="fecha_final" placeholder="fecha_consulta" required autofocus>
														</div>
										</div>
									</div>
									<button colspan="1" type="submit"  id="boton1">Generar Reporte</button>
								   </form>
                                </div>

                          </div>
						          
                    
                </div>
				 
		<script src="JS/menuslide.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
			integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
		</script>
		<script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/7edcc08e48.js" crossorigin="anonymous"></script>
		<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " > </script> 
		<script src="JS/menuslide.js" type="text/javascript"></script>
		<script src="JS/PPDfgenerator.js" type="text/javascript"></script>
		<script src="JS/sinitize.js" type="text/javascript"></script>
		<script src="JS/autocompletar.js" type="text/javascript"></script>
	     <script>
		    $( document ).ready(function() {

			var now = new Date();
			var day = ("0" + now.getDate()).slice(-2);
			var month = ("0" + (now.getMonth() + 1)).slice(-2);

			var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
			$("#fecha_consulta").val(today);
			$("#fecha_inicial").val(today);
			$("#fecha_final").val(today);
			});
		</script>
	</body>
</html>