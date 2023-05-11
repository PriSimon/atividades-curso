<?php require_once 'cabecalho.php';?>

<form action="index.php" method="POST" class="login">
	<h1>Login</h1>
	</br>
	<p>Usuário: <input type="text" name="usuario" size="30" maxlength="30" required></p>
	<p>Senha:   <input type="password" name="senha" size="10" maxlength="10" required></p>
</br></br>
	<h3><input type="submit" value="Login"></p>
</br>
</form>

<?php
	if(isset($_POST['usuario'])){
		$usuario=$_POST['usuario'];
		$senha=$_POST['senha'];
		require_once 'model/Usuario.php';
		$resposta=login($usuario,$senha);
		if ($resposta) { //pode ser também: if($resposta==true)
			echo "<h2>Login com Sucesso!</h2>";
			$teste=criarSessao(true,$usuario);
			echo "<meta http-equiv='refresh'content='2; url=//localhost/SistemaEscola/principal.php'>"; //o que acontece após enviar o login e o tempo que leva para acontecer em segundos
		}else{
			echo "<h2>Erro na tentativa de Login! Redigite</h2>"; //se deu erro no login aparece essa mensagem
		}
		}


?>

