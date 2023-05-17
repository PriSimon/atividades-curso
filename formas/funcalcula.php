<?php //funcalcula - sempre que quiser fazer as contas que deixei pronto aqui posso "puxar" essa função

	function somar($a,$b){
		return $a+$b;
}

	function subtrair($a,$b){
		return $a-$b;
}

	function multiplicar($a,$b){
		return $a*$b;
}

	function dividir($a,$b){
		return $a/$b;
}

	function abraDiv($id){ //monta sozinho uma div, pode usar no menu por exemplo.
		echo "<div id='$id'>";
}

	function fecharDiv(){
		echo "</div>";
}

	function calculaArea($a){ //$a representa o valor digitado, no caso o raio que digitarem. Pode usar outros símbolos, é indiferente
		return 3.14*pow($a,2);
	}


 ?>