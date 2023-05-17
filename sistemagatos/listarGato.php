<?php require_once 'cabecalho.php';

require_once 'model/Gato.php';

if (isset($_GET['ordem'])) { //para ordenar na tabela
	$ordem=$_GET['ordem'];
}else{
	$ordem="";
}


$consulta=retornaUltimoGato();
if ($consulta>=0) {
	
	echo "<table id='gato'>";
		echo "<tr>";
			echo "<th> Código  
				<form id='ord' action='listarGato.php' method='GET'>
				<input type='hidden' name='ordem' value='codigo'>
					<input type='submit' value='&#8659;'></form></th>";
			echo "<th> Nome 
				<form id='ord' action='listarGato.php' method='GET'>
					<input type='hidden' name='ordem' value='nome'>
					<input type='submit' value='&#8659;'></form></th>";	
			echo "<th> Imagem </th>";
			echo "<th> Nascimento <form id='ord' action='listarGato.php' method='GET'>
					<input type='hidden' name='ordem' value='data'>
					<input type='submit' value='&#8659;'></form></th>";
		echo "</tr>";


		$consulta=listarGatos($ordem);

		while($linha=$consulta->fetch_assoc()){
		echo "<tr>";		
			echo "<td>".$linha['cod_gat']."</td>";
			echo "<td>".$linha['nome_gat']."</td>";
			echo "<td class='imagem'><img src='data:image/jpeg;base64,".base64_encode($linha['img_gat'])."'/><form action='mostraGrande.php' method='GET'><input type='hidden' name='codigo' value='".$linha['cod_gat']."'><input id='botaomostra' type='submit' value='Aumentar'><a href='mostraGrande.php' target='quadro'></form></td>"; //para zoom na imagem add o formulário
			echo "<td>".$linha['data_gat']."</td>";	
		echo "</tr>";	
		}
	echo "</table>";
}else{
	echo "<h2>Não há gatos cadastrados!</h2>";
}

?>

</body>
</html>