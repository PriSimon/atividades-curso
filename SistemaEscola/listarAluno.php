<?php 

require_once 'cabecalho.php';  
require_once 'model/Aluno.php';

if (isset($_GET['fim'])) { //para continuar a lista com alunos
	$inicio=$_GET['fim'];
	$inicio++;
	$fim=$inicio+4; //com isso ele vai adicionando mais alunos na próxima página, acrescentando aos que existem
}else{
	$inicio=1; //variáveis globais para ajudar a dividir a informação, dividindo a informação em páginas para não sobrecarregar
	$fim=5;
}

$num_linhas=retornaUltimoAluno();
	if ($num_linhas<1){//se o número de linhas for menor que 1, não tem alunos cadastrados
		echo "<h2>Não há alunos cadastrados!</h2>";
	}else{ //montar a tabela para exibir a turma
		echo "<table class='tabalun'>";
			echo "<tr>"; //cabeçalho da turma (tabela no caso)
				echo "<th class='matricula'>Matrícula</th>";
				echo "<th class='turma'>Turma n&ordm;</th>";
				echo "<th class='cursoalu'>Curso</th>";
				echo "<th class='rg'>RG</th>";
				echo "<th class='cpf'>CPF</th>";
				echo "<th class='aluno'>Nome</th>";
				echo "<th class='data'>Nascimento</th>";
				echo "<th class='tel'>Telefone</th>";
				echo "<th class='end'>Endereço</th>";
			echo "</tr>";


$consulta=listarAluno($inicio,$fim);
require_once "model/Curso.php"; //agora precisa 'puxar' a informação do banco de dados usando o comando abaixo
	
	while($linha=$consulta->fetch_assoc()){
		echo "<tr>";
			echo "<td>".$linha['matricula_alu']."</td>"; //fazer isso com cada parte do conteúdo. Ex.nome, rg. Colocar da forma como aparece no Banco de Dados
			echo "<td>".$linha['cod_tur']."</td>";
			echo "<td>".codigoParaNome($linha['cod_cur'])."</td>";
			echo "<td>".$linha['rg_alu']."</td>";
			echo "<td>".$linha['cpf_alu']."</td>";
			echo "<td>".$linha['nome_alu']."</td>";
				$dia=substr($linha['nasci_alu'],8);
				$mes=substr($linha['nasci_alu'],5,2);
				$ano=substr($linha['nasci_alu'],0,4);
			echo "<td>$dia/$mes/$ano</td>";
			echo "<td>".$linha['telefone_alu']."</td>";
			echo "<td>".$linha['endereco_alu']."</td>";
		echo "</tr>";
		}
	echo "</table>";
	if ($fim<$num_linhas) { //cria a opção para ir para outra página
		echo "<form action='listarAluno.php' method='GET' id='proximo'>";
			echo "<input type='hidden' value='$fim' name='Fim'>";
			echo "<p><input type='submit' value='Proxima' onclick='gatinho()'></p>";
		echo "</form>";
	}
echo "<span id='mensagem'></span>";
echo "<img id='gatinho' class='neko'>";

}

?>
<script src="js/mensagem2.js"></script>
</body>
</html>