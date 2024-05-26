<?php

class LedgerClass
{
    private string $ledgerAccount;
    private int $ledgerBalance;

    public function __construct(string $ledgerAccount, int $ledgerBalance = 0)
    {
        if ($ledgerBalance < 0) {
            throw new InvalidArgumentException("Account initiated error: Initial balance cannot be negative.");
        }
        $this->ledgerAccount = $ledgerAccount;
        $this->ledgerBalance = $ledgerBalance;
    }

    public function getLedgerAccount(): string
    {
        return $this->ledgerAccount;
    }

    public function getLedgerBalance(): int
    {
        return $this->ledgerBalance;
    }

    public function deposit(int $amount): bool
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Deposit Error: Deposit amount must be positive.");
        }
        $this->ledgerBalance += $amount;
        return true;
    }

    public function withdraw(int $amount): bool
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Withdrawal Error: amount must be positive");
        }
        if ($this->ledgerBalance < $amount) {
            throw new RuntimeException("Withdrawal Error: Insufficient funds");
        }
        $this->ledgerBalance -= $amount;
        return true;
    }

    public function getAccountInfo(): array
    {
        return [
            "Ledger Account" => $this->getLedgerAccount(),
            "Ledger Balance" => $this->getLedgerBalance()
        ];
    }
}
