<?php 

require_once 'cabecalho.php';  
require_once 'model/Turma.php';

$consulta=listarTurma();
if (!$consulta){
	echo "<h2>Não há turmas cadastradas!</h2>";
}else{ //montar a tabela para exibir a turma
	echo "<table class='tabturma'>";
	echo "<tr>"; //cabeçalho da turma (tabela no caso)
	echo "<th class='codigo'>Código</th>";
	echo "<th class='curso'>Curso</th>";
	echo "<th class='sala'>N&ordm; Sala</th>";
	echo "</tr>";

	require_once 'model/Curso.php';
	while($linha=$consulta->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$linha['cod_cur']."</td>";
		echo "<td>".codigoParaNome($linha['cod_cur'])."</td>";
		echo "<td>".$linha['sala_tur']."</td>";
		echo "</tr>";
	}

	echo "</table>";
}


?>

</body>
</html>
