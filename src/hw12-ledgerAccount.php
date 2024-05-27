<?php

require_once __DIR__ . '/hw12-ledgerAccountClass.php';
require_once __DIR__ . '/hw11-logger-write.php';

function logOperation(string $operation, string $account, int $amount, bool $result, int $balance): void
{
    $status = $result ? 'successful' : 'failed';
    logWrite("{$operation} of {$amount} was {$status} for account {$account}. Current balance: {$balance}");
}

try {
    $ledgerAcc1 = new LedgerClass("Denyska", 120);
    logWrite("Ledger account successful created. Ledger Account: {$ledgerAcc1->getLedgerAccount()}, Ledger Balance: {$ledgerAcc1->getLedgerBalance()}");
} catch (Exception $e) {
    logWrite("Error during initiated account {$ledgerAcc1->getLedgerAccount()} " . $e->getMessage());
    return;
}

try {
    if ($ledgerAcc1->deposit($amount = 150)) {
        logOperation("Deposit", $ledgerAcc1->getLedgerAccount(), $amount, true, $ledgerAcc1->getLedgerBalance());
    }
} catch (Exception $e) {
    logWrite("Error during operation with account {$ledgerAcc1->getLedgerAccount()}. " . $e->getMessage());
}

try {
    if ($ledgerAcc1->withdraw($amount = 50)) {
        logOperation("Withdrawal", $ledgerAcc1->getLedgerAccount(), $amount, true, $ledgerAcc1->getLedgerBalance());
    }
} catch (Exception $e) {
    logWrite("Error during operation with account {$ledgerAcc1->getLedgerAccount()}. " . $e->getMessage());
}
