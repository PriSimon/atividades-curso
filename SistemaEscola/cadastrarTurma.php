<?php  require_once 'cabecalho.php'; ?>

<form class="cadtur" action="cadastrarTurma.php" method="POST">
	<h1>Cadastro de Turmas</h1>
</br></br>
<?php
	require_once "model/Turma.php";
	require_once "model/Curso.php";

	$consulta=retornaUltimoCodigo();
	if (!$consulta){ //não tem curso inserido, logo não pode cadastrar uma turma
		echo "<h2>Cadastre cursos primeiro!</h2>";
	}else{
		echo "<p>Curso: <select name='curso' required>";
		$consulta=listarNomeCurso();
		while($linha=$consulta->fetch_assoc()) { //esse comando vai buscar e mostrar o nome do curso
			echo "<option value='".$linha['nome_cur']."'>";
			echo $linha['nome_cur']; 
			echo "</option>";
		}
	echo "</select></p>";

?>
</br>
	<p>N&ordm; da Sala: <input type="number" name="sala" min="1" max="50" required></p>
	</br>
	<h3><input type="submit" onclick="mostragato()" value="Cadastrar"></h3>
	</br>

<?php 

	}

?>


</form>
</br>
<span id="mensagem"></span>
<img id="gato">
<?php
	if (isset($_POST ['curso'])) { //se ele enviou o curso na área de cadastrar turma
		$curso=$_POST['curso'];
		$sala=$_POST['sala'];
		$cod_tur=retornaUltimaTurma(); //vai retornar a ultima turma cadastrada para evitar cadastrar repetido ou errado
	
		$cod_tur++;
		if (!$cod_tur) {
			echo "<h2>Turma não encontrada!</h2>";
		}else{
			$cod_cur=cursoParaCod($curso); //pega a função criada para mostrar o código do curso que a pessoa escolher
			if (!$cod_cur) {
				echo "<h2>Curso não encontrado! &#10060;</h2>";
			}else{
				$resposta=cadastrarTurma($cod_tur,$cod_cur,$sala);
				if (!$resposta) {
					echo "<h2>Erro na tentativa de cadastro! &#128172;</h2>";
				}else{
					echo "<h2>Turma cadastrada com sucesso!&#10024;</h2>";
				}
			}

		}
	}

  ?>
<script src="js/mensagem2.js"></script>
</body>
</html>