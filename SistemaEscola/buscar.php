<?php

require_once 'cabecalho.php';
?>

<form action="buscar.php" method="GET" id="buscar">
	<h1>Buscar</h1>
		<p><input type="search" name="busca" required></p>
		<p><fieldset>
			<legend>é um:</legend>
				<input type="radio" name="tipo" value="curso" required>Curso
				<input type="radio" name="tipo" value="aluno"required>Aluno
				<input type="radio" name="tipo" value="turma" required>Turma
		</fieldset></p>
		<p><input type="submit" value="Buscar"></p>
</form>


<?php



?>

</body>
</html>

