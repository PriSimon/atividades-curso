<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>&pi; Área da Circunferência &pi;</title>
	<link rel="stylesheet" type="text/css" href="area.css">
	<meta name="author" content="Priscila Simon">
	<meta name="keywords" content="circulo, calculo, área, raio">
	<meta name="description" content="Calculando a área de um Círculo">

</head>
<body>
	<form action="circulo.php" method="GET">
		<h1>Cálculo da Área do Círculo</h1>

		<img src="raio.png">
			<h2>Lembrando que a fórmula é:  A=&pi; &#215; r&#178;</h2>
			<h2>Digite o raio: 
				<input type="number" name="raio" required></h2>
				<input type="submit" name="Calcular">
	</form>

<?php
	
	if (isset($_GET['raio'])) {
		$raio=$_GET['raio'];
	require_once 'funcalcula.php'; //colocando após o IF ele puxa da biblioteca somente se a pessoa preencher o formulário. Evita sobrecarregar o servidor
	
	echo abraDiv("resultado");
	echo number_format(calculaArea($raio),"2","."," "); //formatação de como o número aparece
	echo fecharDiv();
}
 ?>		


	

</body>
</html>