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
				for($i=0; $i<5; $i++){					
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
						<label for="tc2c2">Conta Corrent</label>
					</div>
					
				</div>

			</div>	
		</div>
		<div class="row">
			<div class="col s5 offset-m1">
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="saldo('c1')">Saldo</a>
				</div>
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="retirar('c1')">Retirar</a>
				</div>
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="depositar('c1')">Depositar</a>
				</div>
				<div class="row">
					<a class="waves-effect waves-light btn" onclick="transferir('c1')">Transferir</a>
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
	function saldo($conta) {		
		if($conta=='c1')
			console.log("saldo c1");
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
			tipoConta: 	$('input[name="tipo-conta1"]:checked').val(),
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
			tipoConta: 	$('input[name="tipo-conta2"]:checked').val(),
		};
		return dados;
	}
</script>
</body>
</html>