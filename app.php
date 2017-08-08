<?php
require "classes/Conta.php";
$dc1 = $_POST['c1'];
$dc2 = $_POST['c2'];

if($dc1['tipoConta']=="comum")
	$c1 = new Conta(
					$dc1["agencia"], 
					$dc1["codigo"], 
					$dc1["titular"], 
					$dc1["data"], 
					$dc1["saldo"]
					);

else if($dc1['tipoConta']=="corrente")
	$c1 = new ContaCorrente(
					$dc1["agencia"], 
					$dc1["codigo"], 
					$dc1["titular"], 
					$dc1["data"], 
					$dc1["saldo"],
					$dc1["limite"]
					);

if($dc2['tipoConta']=="comum")
	$c2 = new Conta(
					$dc2["agencia"], 
					$dc2["codigo"], 
					$dc2["titular"], 
					$dc2["data"], 
					$dc2["saldo"]
					);

else if($dc2['tipoConta']=="corrente")
	$c2 = new ContaCorrente(
					$dc2["agencia"], 
					$dc2["codigo"], 
					$dc2["titular"], 
					$dc2["data"], 
					$dc2["saldo"],
					$dc2["limite"]
					);

processos($c1, $dc1, $c2, $dc2);


function processos($c1, $dc1, $c2, $dc2){
	$acao = $_POST["acao"];
	$conta = $_POST["conta"];

	if($conta==1){
		switch ($acao) {
			case 'saldo':
				echo "Saldo: ".$c1->obterSaldo();
				break;

			case 'deposito':
				$c1->depositar($dc1['deposito']);
				break;

			case 'retirar':				
				$c1->retirar($dc1['retirada']);
				break;

			case 'transferir':
				$c1->transferir($c1, $c2, $dc1['transferir']);
				break;
			
			default:
				echo "foram foi encontrado uma ação para: ".$_POST['acao'];
				break;
		}

	}
	elseif ($conta==2) {
		switch ($acao) {
			case 'saldo':
				echo "Saldo: ".$c2->obterSaldo();
				break;

			case 'deposito':
				$c2->depositar($dc2['deposito']);
				break;

			case 'retirar':
				$c2->retirar($dc2['retirada']);
				break;

			case 'transferir':
				$c2->transferir($c2, $c1, $dc2['transferir']);
				break;
			
			default:
				echo "foram foi encontrado uma ação para: ".$_POST['acao'];
				break;
		}
		
	}

	echo "<br>Mais informações da conta 1: ";
	$c1->printDados();

	echo "<br>Mais informações da conta 2: ";
	$c2->printDados();
}