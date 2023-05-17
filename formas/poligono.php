<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>&#9672; &#9749;Polígonos &#9749;&#9672;</title>
	<meta name="author" content="Priscila Simon">
	<meta name="keywords" content="calculo, área, poligono">
	<meta name="description" content="Calculando a área de Polígonos">
	<style>
		
	
		#resultado{
			width: 50vw;
			height: 60vh;
			margin-top: 10vh;
			border: 5px inset #A65F46;
			border-radius: 16px;
			margin-left: 25vw;

		}
		#resultado img{
			width: 40%;
			height: 65%;
			margin-left: 28%;


		}
		#resultado h1{
			text-align: center;
			color: #A65151;
			text-shadow: 2px 2px 4px #F28705;
		}
		#resultado p{
			text-align: center;
			color: #A65151;
			text-shadow: 2px 2px 2px #F28705;
		}
		form{
			text-align: center;
			color: #A65151;
			text-shadow: 2px 2px 4px #F28705;
	
		}

	</style>
</head>
<body>
	<form action="poligono.php" method="GET">
		<h1>Polígonos</h1>
			<p>Digite o número de lados:
				<input type="number" name="lados" min="3" title="Pelo menos três lados para formar um Polígono&#9947;" required></p>
			<p>Digite a medida do lado:
				<input type="number" name="medida" min="1" required></p>
			<p><input type="submit" value="Verificar"></p>	<!-- CONSIDERANDO QUE ELE TENHA LADOS IGUAIS PARA CALCULAR, OU SEJA FIGURAS EQUILÁTERAS-->
	</form>
<?php
	if (isset($_GET['lados'])) {
		$lados=$_GET['lados'];
		$medida=$_GET['medida'];

		echo "<div id='resultado'>"; 
		if ($lados==3) {
			echo "<h1>Triângulo</h1>"; 
			$area=($lados*$lados)/2;
			echo "<p>Área $area</p>";
			echo "<img src='triangulo.png'>";
		}else if ($lados==4) {
			echo "<h1>Quadrado</h1>";
			$area=$lados*$lados;
			echo "<p>Área $area</p>";
			echo "<img src='quadrado.jpg'>";
		}else if ($lados==5) {
			echo"<h1>Pentágono</h1>";
			$area=5*$lados*$lados;
			echo "<p>Área $area</p>";
			echo "<img src='pentagono.png'>";
		}else{
			echo "<h1>Polígono</h1>";
			echo "<p>Com $lados lados</p>";
			echo "<img src='pory.gif'>";
		}
	}
?>
</body>
</html>