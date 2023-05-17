<?php require_once 'cabecalho.php';

echo "<h1>Home - Início</h1>";
echo "<p>Hoje é ".date("d/m/Y")."</p>";


require_once 'model/Gato.php';
$consulta=verificarAniversario(date("Y-m-d")); //para criar um alerta de eventos
if (!$consulta) {
	echo "</br>";
	echo "<div id='push'>";
	echo "</br>";
	echo "<h2>Dia comum</h2>";
	echo "</br>";
	echo "<p>Nada programado para hoje</p>";
	echo "</div>";
}else{
	while ($linha=$consulta->fetch_assoc()){
		echo "<div id='push'>";
		echo "</br>";
		echo "<h3>Aniversário de ".$linha['nome_gat']."</h3>";
		echo "</br>";
		echo "<p>&#127881;Dê os parabéns a ele!&#127881;</p>";
		echo "</div>";

	}

}

?>

</body>
</html>