<?php
require_once './persistence/Banco.php';

function cadastrarAluno($matricula_alu,$cod_tur,$cod_cur,$rg_alu,$cpf_alu,$nome_alu,$nasci_alu,$telefone_alu,$endereco_alu){ //todos os dados que aparecem no Banco para cadastrar um aluno, no caso a tabela dele.

	$banco=new Banco();
	$sql="insert into aluno values($matricula_alu,$cod_tur,$cod_cur,$rg_alu,$cpf_alu,'$nome_alu','$nasci_alu','$telefone_alu','$endereco_alu')";
	
	$resp=$banco->executar($sql);
	if($resp){
		return true;
	}else{
		return false;
	} 
}

function retornaUltimoAluno(){
	$banco=new Banco();
	$sql="select max(matricula_alu) from aluno";
	$consulta=$banco->consultar($sql);
	if (!$consulta) {
		return false;
	}else{
		while($linha=$consulta->fetch_assoc()){ //para que a consulta saia em partes e não enorme
			$ultimo=$linha['max(matricula_alu)'];
		}
		return $ultimo;
	}
}
function listarAluno($inicio,$fim){
		$banco=new Banco();
		$sql="select * from aluno where matricula_alu>=$inicio and matricula_alu<=$fim order by matricula_alu"; //com isso vai dividir a busca e evita ficar muito lento
		$consulta=$banco->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			return $consulta;
		}
	}

?>