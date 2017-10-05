<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<link rel="stylesheet" type="text/css" href="template.css">
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<div class="login">
		<div class="login--box">
			<form class="L_wrap" method="post">
			<?php
				if(isset($msg)){
					echo "<br><b>$msg</b><br><br>";					
				}
			?>
				<label class="L_label" for="Login">Login</label>
				<input class="L_input" type="text" name="login" id="Login">
				<label class="L_label" for="Senha">Senha</label>
				<input class="L_input" type="password" name="senha" id="Senha">
				<button class="L_submit" type="submit">LOGAR</button>
			</form>
		</div>
	</div>
	<div>
	
	</div>
</body>
</html>