<?php

require_once __DIR__ . '/hw12-ledgerAccountClass.php';

$ledgerAcc1 = new LedgerClass("Denys2816");
$ledgerAcc1->deposit(150);
$ledgerAcc1->withdraw(22);
echo $ledgerAcc1->getAccountInfo();
?>