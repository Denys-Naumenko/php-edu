<?php

require_once __DIR__ . '/hw11-logger-write.php';
require_once __DIR__ . '/hw11-logger-read.php';

class LedgerClass
{
    private string $ledgerAccount;
    private int $ledgerBalance;

    public function __construct(string $ledgerAccount, int $ledgerBalance = 0)
    {
        $this->ledgerAccount = $ledgerAccount;
        $this->ledgerBalance = $ledgerBalance;
        logWrite("Created new account {$ledgerAccount} with balance \${$ledgerBalance}");
    }

    public function getLedgerAccount(): string
    {
        return $this->ledgerAccount;
    }

    public function getLedgerBalance(): int
    {
        return $this->ledgerBalance;
    }

    public function deposit(int $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Deposit amount must be positive");
        }
        $this->ledgerBalance += $amount;
        logWrite("Deposited \${$amount} to account {$this->ledgerAccount}, new balance: \${$this->ledgerBalance}");
    }

    public function withdraw(int $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Withdrawal amount must be positive");
        }
        if ($this->ledgerBalance < $amount) {
            throw new RuntimeException("Insufficient funds");
        }
        $this->ledgerBalance -= $amount;
        logWrite("Withdrew \${$amount} from account {$this->ledgerAccount}, new balance: \${$this->ledgerBalance}");

    }

    public function getAccountInfo(): void
    {
        echo "Ledger Account:" . $this->getLedgerAccount() . PHP_EOL;
        echo "Ledger Balance:" . $this->getLedgerBalance() . PHP_EOL;
    }
}

?>