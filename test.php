<?php
require "classes/Conta.php";

$c1 = new Conta("age11", "cod90", "ferreira", "12/12/2012", 10.000);

echo "Dados: ".$c1->printDados();

echo "Saldo: ".$c1->obterSaldo();