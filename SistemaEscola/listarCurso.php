<?php 
require_once 'cabecalho.php'; 
require_once 'model/Curso.php';

$consulta=listarCurso();
	if (!$consulta) {
		echo "<h2>Nenhum curso cadastrado!</h2>";
	}else{ //criar tabela com os dados

		echo "<table>";
		echo "<tr>"; //linha é tr 
		echo "<th class='codigo'>Código</th>"; //cédula da tabela 
		echo "<th>Nome</th>";
		echo "<th class='periodo'>n&ordm; Períodos</th>";
		echo "<th class='mensalidade'>Mensalidade R$</th>";
		echo "<th class='turno'>Turno</th>";
		echo "</tr>";
		
	while($linha=$consulta->fetch_assoc()) { //laço de repetição para as linhas da tabela

		echo "<tr>";
		echo "<td class='codigo'>".$linha['cod_cur']."</td>"; 
		echo "<td>".$linha['nome_cur']."</td>";
		echo "<td class='periodo'>".$linha['periodos_cur']."</td>";
		echo "<td class='mensalidade'>".$linha['mensalidade_cur']."</td>";
		echo "<td class='turno'>".$linha['turno_cur']."</td>";
		echo "</tr>";
		}
	}

?>
</body>
</html>