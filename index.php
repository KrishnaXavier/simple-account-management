<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>     
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link type="text/css" rel="stylesheet" href="css/style.css"/>     
	<title>Gerenciador de Contas</title>   
	<title></title>
</head>
<body>

	<div class="cont-conta">
		<div><h3 class='center-align'>Contas</h3></div>		
		<form  method="post" enctype="multipart/form-data" name="conta" action="#">		

			<div class="col s5">
				<div class="row">
					<div class="col s5 offset-m1"><h4>Conta 1</h4></div>
					<div class="col s5 offset-m1"><h4>Conta 2</h4></div>
				</div>
				<?php 
				require "atributos.php";
				for($i=0; $i<=5; $i++){					
					?>
					<div class="row">
						<div class="input-field col s5 offset-m1">
							<i class="material-icons prefix"><?php echo $atrib[2][$i]; ?></i>
							<input name="c1-<?php echo $atrib[0][$i]; ?>" type="text" class="validate" required value="<?php echo $atrib[1][$i]; ?> conta 1 (teste)">
							<label><?php echo $atrib[1][$i]; ?></label>
						</div>

						<div class="input-field col s5 offset-m1">
							<i class="material-icons prefix"><?php echo $atrib[2][$i]; ?></i>
							<input name="c2-<?php echo $atrib[0][$i]; ?>" type="text" class="validate" required value="teste">
							<label><?php echo $atrib[1][$i]; ?></label>
						</div>
					</div>
					<?php
				}
				?>
				<div class="row">
					<div class="col s5 offset-m1">
						Tipo da Conta:
						<input name="tipo-conta1" type="radio" value="comum" id="tc1c" checked="true" required>
						<label for="tc1c">Conta Comum</label>					
						<input name="tipo-conta1" type="radio" value="corrente" id="tc2c">
						<label for="tc2c">Conta Corrent</label>
					</div>

					<div class="col s5 offset-m1">
						Tipo da Conta:
						<input name="tipo-conta2" type="radio" value="comum" id="tc1c2" checked="true" required>
						<label for="tc1c2">Conta Comum</label>
						<input name="tipo-conta2" type="radio" value="corrente" id="tc2c2">
						<label for="tc2c2">Conta Corrente</label>
					</div>
					
				</div>

			</div>	
		</div>
		<div class="row">
			<div class="col s5 offset-m1">
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="processo('saldo', 1)">Saldo</a>					
				</div>
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="processo('retirar', 1)">Retirar</a>
					<input name="c1-retirada" type="number" class="validate" value="10">
				</div>
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="processo('deposito', 1)">Depositar</a>
					<input name="c1-deposito" type="number" class="validate" value="35">
				</div>
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="processo('transferir', 1)">Transferir</a>
					<input name="c1-transferir" type="number" class="validate" value="20">
				</div>
			</div>

			<div class="col s5 offset-m1">
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="processo('saldo', 2)">Saldo</a>					
				</div>
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="processo('retirar', 2)">Retirar</a>
					<input name="c2-retirada" type="number" class="validate" value="10">
				</div>
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="processo('deposito', 2)">Depositar</a>
					<input name="c2-deposito" type="number" class="validate" value="35">
				</div>
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="processo('transferir', 2)">Transferir</a>
					<input name="c2-transferir" type="number" class="validate" value="20">
				</div>
			</div>
		</div>
	</form>
	<div class="row center-align">			
		<div class="aviso">
		</div>
	</div>

</div>
<script type="text/javascript">
	window.onload =function(){
		init();
	}

	function saldo($conta) {		
		if($conta=='c1')
			processo("saldo", 1);
		else if($conta=='c2')
			console.log("saldo c2");
	}

	function retirar($conta) {		
		if($conta=='c1')
			console.log("retirar c1");
		else if($conta=='c2')
			console.log("retirar c2");
	}

	function depositar($conta) {		
		if($conta=='c1')
			console.log("depositar c1");
		else if($conta=='c2')
			console.log("depositar c2");
	}

	function transferir($conta) {		
		if($conta=='c1')
			console.log("transferir c1");
		else if($conta=='c2')
			console.log("transferir c2");
	}

	function dadosC1(){
		let dados = 
		{
			agencia: 	$('input[name="c1-agencia"]').val(),
			codigo: 	$('input[name="c1-codigo"]').val(),
			titular: 	$('input[name="c1-titular"]').val(),
			data: 		$('input[name="c1-data"]').val(),
			saldo: 		$('input[name="c1-saldo"]').val(),
			limite: 	$('input[name="c1-limite"]').val(),
			tipoConta: 	$('input[name="tipo-conta1"]:checked').val(),

			retirada: 		$('input[name="c1-retirada"]').val(),
			deposito: 		$('input[name="c1-deposito"]').val(),
			transferir: 	$('input[name="c1-transferir"]').val(),

		};
		return dados;
	}

	function dadosC2(){
		let dados = 
		{
			agencia: 	$('input[name="c2-agencia"]').val(),
			codigo: 	$('input[name="c2-codigo"]').val(),
			titular: 	$('input[name="c2-titular"]').val(),
			data: 		$('input[name="c2-data"]').val(),
			saldo: 		$('input[name="c2-saldo"]').val(),
			limite: 	$('input[name="c2-limite"]').val(),
			tipoConta: 	$('input[name="tipo-conta2"]:checked').val(),

			retirada: 		$('input[name="c2-retirada"]').val(),
			deposito: 		$('input[name="c2-deposito"]').val(),
			transferir: 	$('input[name="c2-transferir"]').val(),
		};
		return dados;
	}

	function processo(acao, conta){
		console.log("processo: "+acao+", "+conta);
		console.log(dadosC1());
		console.log(dadosC2());

		let request = $.ajax({
			url: 'app.php',
			data: {c1:dadosC1(), c2:dadosC2(), acao:acao, conta:conta},	
			type: 'POST',
			success:function(data){
				$('.aviso').html(data);
			}								
		});
	}

	function init(){
		$('input[name="c1-agencia"]').val(r(10000, 99999));
		$('input[name="c2-agencia"]').val(r(10000, 99999));

		$('input[name="c1-codigo"]').val(r(10, 999));
		$('input[name="c2-codigo"]').val(r(10, 999));

		$('input[name="c1-titular"]').val("titular"+r(500, 100));
		$('input[name="c2-titular"]').val("titular"+r(500, 100));

		$('input[name="c1-data"]').val(r(30, 1)+"/"+r(11, 1)+"/"+r(13, 2004));
		$('input[name="c2-data"]').val(r(30, 1)+"/"+r(11, 1)+"/"+r(13, 2004));

		$('input[name="c1-saldo"]').val(r(10000, 5));
		$('input[name="c2-saldo"]').val(r(10000, 5));		

		$('input[name="c1-limite"]').val(r(100, 50));
		$('input[name="c2-limite"]').val(r(100, 50));
	}

	function r(min, max){
		return Math.floor((Math.random() * min) + max);
	}
</script>
</body>
</html>


