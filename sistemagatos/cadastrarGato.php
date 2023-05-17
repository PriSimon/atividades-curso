<?php require_once 'cabecalho.php'; ?>

<form id="push" class="cadastro" action="cadastrarGato.php" method="POST" enctype="multipart/form-data">
	<h1>&#128486;Cadastro de Gatos&#128487;</h1>
	<hr class="cada">
	<p class="nome">Nome: <input type="text" name="nome" size="40" maxlength="40" pattern="[A-Za-z]{2,40}" required></p> <!--pattern bloqueia tentativas maliciosas digitando comandos que podem colocar o Banco de Dados em risco-->
	<p class="foto">Foto: <input type="file" name="imagem" required></p>
	<p class="data">Data de Nascimento: <input type="date" name="nasci" max="<?php echo date("Y-m-d"); ?>" min="<?php echo criarMinimo(date("Y-m-d"));?>"></p>

	<p class="botao"><input type="submit" name="enviar" onclick="cadastro()" value="Cadastre"></p>	
</form>
<br>
<span id="mensagem"></span>
<img id="img">
<?php
	if (isset($_POST['enviar'])) {
		$nome_gat=$_POST['nome'];
		$img_gat=$_FILES['imagem']['tmp_name']; //para a imagem
		$data_gat=$_POST['nasci'];

		$img_gat=addslashes(file_get_contents($img_gat)); //aqui pega os dados da imagem, vai compactar e colocar "" para converter

		require_once 'model/Gato.php';
		$cod_gat=retornaUltimoGato();
		if ($cod_gat>=0) {
			$cod_gat++; //para continuar a contagem
			$resp=cadastrarGato($cod_gat,$nome_gat,$img_gat,$data_gat);
		echo $resp;
			if (!$resp) {
		
			echo "<h2>Erro na tentativa de cadastro!</h2>";
			}else{
				echo "<h2>Cadastrado com sucesso! &#128008;</h2>";
			} 
		}else{
			echo "<h2>Erro na tentativa de extrair código!</h2>";
		}
	}

function criarMinimo($hoje){
	$ano=substr($hoje,0,4);
	$ano-=25;
	return $ano."-01-01";
}

?>






<!-- max="<?php echo date("Y-m-d"); ?>" min="<?php echo criarMinimo(date("Y-m-d"));?> Inserir no nascimento para delimitar a data -->



<script src="js/mensagem.js"></script>
</body>
</html>