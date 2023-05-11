<?php require_once 'cabecalho.php';?>

<form action="cadastrarCurso.php" class="cadcurso" method="POST">
	<h1>Cadastro de Curso</h1>
</br></br></br></br>
	<p>Nome do Curso: <input type="text" name="nome" size="40" maxlength="40" required></p>
	<p>N&ordm; de Períodos:  <input type="number" name="periodos" min="1" max="10" required></p>
	<p>Mensalidade R$ <input type="text" name="mensalidade" pattern="[0-9]{1,8}\.[0-9]{2}" placeholder="999,99" title="Somente números, centavos obrigatórios, ponto e não vírgula. Ex.: 999.99" required></p>
	<p>Turno: <select name="turno" required>
		<option value="manhã">Manhã</option>
		<option value="tarde">Tarde</option>
		<option value="noite">Noite</option>
	</select></p> <!-- aqui cria um menu com opções para escolher-->
	</br></br>
	<p><input type="submit" onclick="mostragato()" value="Cadastrar" class="enviar"></p>
</br>
	
</form>
<span id="mensagem"></span>
<img id="gato2">
<?php //faz os dados que ela inserir irem para o sistema

	if (isset($_POST['nome'])) {
		$nome=$_POST['nome'];
		$periodos=$_POST['periodos'];
		$mensalidade=$_POST['mensalidade'];
		$turno=$_POST['turno'];
		require_once 'model/Curso.php';
		$codigo=retornaUltimoCodigo(); //função criada para pegar do banco de dados o código do curso que já existe
		if (!$codigo) { //se der erro aparece essa mensagem
			echo "<h2>Não há curso cadastrado! &#10060;</h2>";
		}else{
			$codigo++; //vai contar a partir dos números que já existem, continua a contagem
			$resposta=cadastrarCurso($codigo,$nome,$periodos,$mensalidade,$turno);
			if (!$resposta) {//voltou false (errado)
				echo "<h2>Falha na tentativa de cadastro! &#128172;</h2>";
			}else{
				echo "<h2>Curso cadastrado com Sucesso! &#10024;</h2>";
			}

		}
	}

?>
<script src="js/mensagem2.js"></script>
</body>
</html>