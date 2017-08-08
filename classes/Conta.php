<?php
class Conta{	
	var $agencia, $codigo, $titular, $dataCriacao, $saldo;

	function __construct($agencia, $codigo, $titular, $dataCriacao, $saldo){
		$this->agencia 		= $agencia;
		$this->codigo 		= $codigo;
		$this->titular 		= $titular;
		$this->dataCriacao 	= $dataCriacao;
		$this->saldo 		= $saldo;
	}

	public function retirar($valor){
		if($this->saldo>=$valor){
			echo "valor da ação foi aceito";
			$this->saldo -=$valor;			
			return true;			
		}
		else{
			echo "valor da ação foi recusado";
			return false;
		}	
	}

	public function depositar($valor){
		$this->saldo += $valor;
	}

	public function transferir($conta1, $conta2, $valor){
		/* transferir da conta1 para conta2*/
		if($conta1->obterSaldo()>=$valor){
			try{
				$conta1->retirar($valor);
				$conta2->depositar($valor);
			}catch (Exception $e) {
    			echo 'Ocorreu um erro na transferencia. Exceção capturada: ',  $e->getMessage(), "\n";
			}

		}else{
			echo "impossivel fazer a transferencia, saldo da conta 1 é inferior ao valor";
		}
	}

	public function obterSaldo(){		
		return $this->saldo;
	}

	public function printDados(){		
		echo "Agência: ".			$this->agencia;
		echo ", Código: ".			$this->codigo;
		echo ", Titular: ".			$this->titular;
		echo ", Data de Criação: ".	$this->dataCriacao;
		echo ", Saldo: ".				$this->saldo;
	}

	/* metodos de saida */
	private function printSaldo(){echo "Saldo atual: ".$this->saldo;}
}

class ContaCorrente extends Conta{
	var $limite;

	function __construct($agencia, $codigo, $titular, $dataCriacao, $saldo, $limite){
		$this->agencia 		= $agencia;
		$this->codigo 		= $codigo;
		$this->titular 		= $titular;
		$this->dataCriacao 	= $dataCriacao;
		$this->saldo 		= $saldo;	
		$this->limite 		= $limite;
	}

	public function retirar($valor){
		if($this->saldo>=$valor){
			echo "valor da ação foi aceito";
			$this->saldo -=$valor;			
			return true;			
		}
		elseif ( ($this->saldo +$this->limite) >= $valor) {
			echo "valor da ação foi aceito, você usou o limite";
			$this->saldo -=$valor;			
			return true;					
		}
		else{
			echo "valor da ação foi recusado";
			return false;
		}	
	}

	public function verificarLimite(){ 
		return $this->limite - $obterSaldo();
	}
}