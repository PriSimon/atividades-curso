<?php
 require_once './persistence/Banco.php';

 function cadastrarGato($cod_gat,$nome_gat,$img_gat,$data_gat){
 	if (func_num_args()) { //Função de teste para ver se está tudo certo
	return false;
}else{
 	$banco=new Banco();
 	$sql="insert into gato values ($cod_gat,'$nome_gat','$img_gat','$data_gat')";
 	$resp=$banco->executar($sql);
	return var_dump($resp);
 	if (!$resp) {
 		return false;
 	}else{
 		return true;
 	}
 }
}
function retornaUltimoGato(){
	$banco=new Banco();
	$sql="select max(cod_gat) from gato";
	$consulta=$banco->consultar($sql);
	if (!$consulta) {
		return false;
	}else{
		while($linha=$consulta->fetch_assoc()){
			$codigo=$linha['max(cod_gat)'];
		}
		if ($codigo==NULL) { //troca o que iria aparecer de NULL para 0
			$codigo=0;
		}
		return $codigo;
	}
}

function listarGatos($ordem){
	$banco=new Banco();
	if ($ordem==""||$ordem=="codigo") {
	$sql="select * from gato order by cod_gat"; //para colocar a opção de ordenar a lista
}else if($ordem=="nome"){
	$sql="select * from gato order by nome_gat";
}else if($ordem=="data"){
	$sql="select * from gato order by data_gat";
}
	$consulta=$banco->consultar($sql);
	if (!$consulta) {
		return false;
	}else{
		return $consulta;
	}
}

function verificarAniversario($data){ //para criar alertas de datas especificas
	$banco=new Banco();
	$sql="select nome_gat from gato where data_gat='$data'";
	$consulta=$banco->consultar($sql);
	if (!$consulta) {
		return false;
	}else{
		return $consulta;
	}
} 
?>