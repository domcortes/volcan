<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/login.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<title>Inicio de Sesion</title>
	</head>
	<body>
		<div class="container">
			<div class="frame">
				<div class="nav">
					<ul class="links">
						<li class="signin-active"><img src="/img/favicon.png" alt=""><a class="btn">Inicio de sesion</a></li>
					</ul>
				</div>
				<div ng-app ng-init="checked = false">
					<form class="form-signin" action="" method="post" name="form">
						<label for="username">Usuario</label>
						<input class="form-styling" type="text" name="username" placeholder="" />
						<label for="password">Contraseña</label>
						<input class="form-styling" type="text" name="password" placeholder="" />
						<div class="btn-group btn-block">
							<a href="/" class="btn btn-danger">Volver</a>
							<button class="btn btn-info">Entrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>