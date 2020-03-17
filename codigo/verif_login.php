
<?php
session_start();
if(isset($_SESSION['nombres'])){
    header("location:datos_medicos.php");
}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Check Login and create session</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		     
		<?php
		include_once 'user.php';
		include_once 'userlogin.php';

		$userSession= new UserSession();
		$user = new User();
			
			if(isset($_SESSION['name'])){
				$user->setUser($userSession->getCurrentUser());
				header("location:datos_medicos.php");
			}else if(isset($_POST['email']) && isset($_POST['password'])){
				$emailForm=$_POST['email'];
				$passForm=$_POST['password'];

				if($userSession->userExists($emailForm,$passForm)){
					$userSession->setCurrentUser($emailForm);
					$user->setUser($emailForm);
					header("location:datos_medicos.php");
				}else{
					echo "<div class='alert alert-danger mt-4' role='alert'>Email or Password are incorrects!
				     <p><a href='loginmedicos.php'><strong>Please try again!</strong></a></p></div>";	
				}     
			}else{
				
				header("location:loginmedicos.php");
			}

	
			?>
		
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>