<?php
require_once './model/Gato.php';


//Exemplos de teste: tentar cadastrar usando informações no formato incorreto ou ainda sem certos requisitos. 

//1 teste: $resp=cadastrarGato();


//2 passando parametros errados para cadastrar: $resp=cadastrarGato(2,Milho,'image','2000-03-15');


//3 Data errada, dados errados, falta de informações: (10,"Faker','Não tem','2023-03-25'),(11,'Outro'","$img_gat","$data_gat");

$resp=cadastrarGato(); //(); Digitar o que for testar
if (!$resp) {
	echo "<img src='img/erro.gif'/>";
}else{
	echo "Sucesso!";
}

?>