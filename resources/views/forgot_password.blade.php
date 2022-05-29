<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Esqueci a senha</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/assets/img/img/Icone.png" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Montserrat:100,200,300,400,500,600,700,800,900"]},
			custom: {"families":["Flaticon", "LineAwesome"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/ready.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h4 class="text-center mb-3">Esqueci minha senha</h4>
			<h3 class="text-center">Para recuperar seu acesso, precisamos do seu E-mail.</h3>
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input id="username" name="username" type="email" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">E-mail</label>
				</div>
				<div class="form-action">
					<a href="#" class="btn btn-success btn-rounded btn-login">Continuar</a>
				</div>
				<div class="login-account row">
					<span class="msg col-12">Precisa de ajuda?</span>
					<span class="msg col-12">Entre em contato com nosso administrativo.</span>
				</div>
			</div>
		</div>
	</div>
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<script src="../assets/js/ready.js"></script>
</body>
</html>