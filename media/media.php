<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>&#128204;Média de Números&#128204;</title>
	<link rel="stylesheet" type="text/css" href="mediano.css">

</head>
<body>

	<form action="media.php" method="POST">
		<h1>Média Aritmética</h1>
		<p>De quantos números você deseja calcular a média?
			<input type="number" name="quantidade" min="2" required></p>
		<p><input type="submit" value="Enviar"></p>
	</form>
<?php
	if (isset($_POST['quantidade'])) {
			echo "<form action='media.php' method='POST'>";
			echo "<h2>Digite os números:</h2>";
				$quantidade=$_POST['quantidade'];
		for ($i=1; $i<=$quantidade; $i++) {
			echo "<p>Digite o $i <input type='number' name='numero$i' required></p>";
		}
		echo "<p><input type='hidden' name='quant' value='$quantidade'></p>"; //campo escondido para conseguir salvar a informação anterior para a próxima fase
			echo "<p><input type='submit' value='calcular'></p>";
			echo "</form>";		
	}
	if (isset($_POST['numero1'])) { //se a pessoa enviou um número 
		$media=0;
		$quantidade=$_POST['quant']; //indica a informação que ficou no hidden e mostra que deve pegar a informação anterior
		for ($i=1; $i<=$quantidade; $i++) { 
			$media=$media+$_POST["numero$i"];
		}
		$media=$media/$quantidade; //precisa cuidar e deixar claro a quantidade para essa área, ele não liga a informação anterior.
		echo "<h3>A média é $media.</h3>";
	}
?>

</body>
</html>