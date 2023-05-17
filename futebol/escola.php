<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escolinha de &#9917;</title>
	<link rel="stylesheet" type="text/css" href="futebol.css">
	<meta name="author" content="Priscila Simon">
	<meta name="keywords" content="classificação, escola, futebol, idade">
	<meta name="description" content="Classificando baseado no ano de nascimento">
</head>

<body>
	
	<form action="escola.php" method="GET">
		<h1>&#9917; Classificação do Jogador &#9917;</h1>
	</br></br>
		<p>Digite o ano de nascimento do jogador:
			<input type="number" name="ano" min="4" size= "10" placeholder="2004" title="use apenas os números do ano de nascimento" required></p>
		</br></br>
		<p><input type="submit" value="Verificar"></p>
	</form>
<?php
	if (isset($_GET['ano'])) {
		$ano=$_GET['ano'];
		$idade=2023-$ano;
		
		echo "<div id='resultado'>";
			if ($idade>=7 && $idade <=9) {	
		echo "<h2>Parabéns! A sua categoria é Fraldinha!!!</h2>";
		echo "<img src='fralda.png'>";

		}else if ($idade>=10 && $idade <11) {	
		echo "<h2>Parabéns! A sua categoria é Dente de Leite!!!</h2>";
		echo "<img src='dente.png'>";

		}else if ($idade>=11 && $idade <=13) {	
		echo "<h2>Parabéns! A sua categoria é Mirim!!!</h2>";
		echo "<img src='mirim.png'>";

		}else if ($idade>=14 && $idade <=16) {	
		echo "<h2>Parabéns! A sua categoria é infanto-juvenil!!!</h2>";
		echo "<img src='infanto.png'>";

		}else if ($idade>=17 && $idade <=18) {	
		echo "<h2>Parabéns! A sua categoria é juvenil!!!</h2>";
		echo "<img src='juvenil.png'>";

		}else if ($idade>=19 && $idade <=20) {	
		echo "<h2>Parabéns! A sua categoria é Júnior!!! Sem a Sandy...</h2>";
		echo "<img src='junior.jpg'>";

		}else if ($idade >=21) {	
		echo "<h2> Parabéns! A sua categoria é grande demais pra nossa escola!!!</h2>";
		echo "<img src='grande.jfif'>";

		}else if ($idade>=0 && $idade <=6) {
			echo "<h2>Ei! Você é muito novo para jogar! Volte daqui alguns anos!</h2>";
			echo "<img src='naopode.jpg'>";
	
		}elseif ($idade <0) {
			echo "<h2>Ei! Você é nem nasceu ainda!!!</h2>";
			echo "<img src='que.jpg'>";

		echo "</div>";
		}
		}
		
?>
</body>
</html>