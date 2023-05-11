<?php 
require_once 'cabecalho.php';

?>

<form class="aluform" action="cadastrarAluno.php" method="POST">
	<h1>Cadastro de Alunos</h1>


<?php

	require_once 'model/Turma.php';
	require_once 'model/Curso.php';

	$consulta=retornaUltimoCodigo();
	if(!$consulta){
		echo "<h2>Cadastre um Curso Primeiro!</h2>";
	}else{
		$consulta=retornaUltimaTurma();
		if (!$consulta) {
			echo "<h2>Cadastre a Turma Primeiro!</h2>";
		}else{
		echo "</br>";
		echo "<p>Selecione o Curso: <select name='curso' required>"; //aparecer os cursos para escolher
		$cursos=listarNomeCurso();
		while($linha=$cursos->fetch_assoc()) {
			echo "<option value='".$linha['nome_cur']."'>";
			echo $linha['nome_cur']; 
			echo "</option>";
		}
	echo "</select></p>";
	echo "<h3><input type='submit' onclick='mostragato()' value='Escolher' class=enviar></h3>";
	echo "</br>";
		}
	}

	?>
</form>
<span id="mensagem"></span>
<img id="gato">
<?php

if (isset($_POST['curso'])) {
	$curso=$_POST['curso'];
		echo "<form class='alunocad' action='cadastrarAluno.php' method='POST'>";
		echo "</br>";
		echo "<p>Nome: <input type='text' name='nome' size='70' maxlength='70' placeholder='Nome completo' required></p>";
		echo "<input type='hidden' name='cursocod' value='".cursoParaCod($curso)."'>"; //para pegar automático o código do curso
	$turmas=retornaTurmasCurso(cursoParaCod($curso)); //Aqui vai colocar quais as turmas que existem do curso
	if (!$turmas) {
		echo "<h2>Não há turmas para este curso. Cadastre-as primeiro!</h2>";
	}else{
		echo "<p>Turma:<fieldset id=caixatur>";
	while ($linha=$turmas->fetch_assoc()) {
		echo  "<input type='radio' id='radio' name='turma' value='".$linha['cod_tur']."'><span id='botao'>".$linha['cod_tur']."</span></fieldset></p>";
   //criar botões com opções para escolher
		}
		

		echo "<p>RG:  <input type='number' name='rg' size='11' placeholder='Apenas números' required></p>";
		echo "<p>CPF: <input type='number' name='cpf'  size='12' placeholder='Apenas números' required></p>";
		echo "<p>Data de nascimento:  <input type='date' name='nasci' max='2023-03-12' required></p>";
		echo "<p>Telefone:  <input type='text' name='telefone' size='12' placeholder='42999887766' required></p>";
		echo "<p>Endereço: <input type='text' name='endereco' size='70' maxlength='70' required></p>";
		echo "</br>";
		echo "<h3><input type='submit' onclick='gatinho()' value='Cadastrar' class=enviar></h3>";
		echo "</br>";
	}
		echo "</form>";
}
		echo "<span id='mensagem2'></span>";
		echo "<img id='gatinho'>";

	if (isset($_POST['nome'])) {
		$nome=$_POST['nome'];
		$cod_cur=$_POST['cursocod'];
		$rg=$_POST['rg'];
		$cpf=$_POST['cpf'];
		$cod_tur=$_POST['turma'];
		$nasci=$_POST['nasci'];
		$telefone=$_POST['telefone'];
		$endereco=$_POST['endereco'];
	require_once 'model/Aluno.php';
		$matricula=retornaUltimoAluno();
	if (!$matricula) {
			echo "<h2>Erro ao encontrar matrículas! &#10060;</h2>";
	}else{
			$matricula++; //para ele continuar a contagem 
			$resposta=cadastrarAluno($matricula,$cod_tur,$cod_cur,$rg,$cpf,$nome,$nasci,$telefone,$endereco);
				if (!$resposta) {
					echo "<h2>Erro na tentativa de cadastro! &#128172;</h2>";
				}else{
					echo "<h2>Aluno cadastrado com sucesso! &#10024;</h2>";

		}
	}
}

?>

</br>

<script src="js/mensagem2.js"></script>
</body>
</html>