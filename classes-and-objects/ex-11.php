<?php declare(strict_types=1);

class Account
{
    private string $accountName;
    private int $balance;

    public function __construct(string $accountName, int $balance)
    {
        $this->accountName = $accountName;
        $this->balance = $balance;
    }

    public function deposit($amount)
    {
        $this->balance = $this->balance + $amount;
    }

    public function withdrawal($amount)
    {
        $this->balance = $this->balance - $amount;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }
    public function getAccountName(): string
    {
        return $this->accountName;
    }

    public function transfer(Account $from, Account $to, int $amount)
    {
        if ($from->balance >= $amount) {
            $from->withdrawal($amount);
            $to->deposit($amount);
            echo "Transfer of $amount from {$from->accountName} to {$to->accountName} successful.\n";
        } else {
            echo "Insufficient balance in {$from->accountName} to transfer $amount.\n";
        }
    }
}

class accountTest
{
    public static function main()
    {
        $accounts = [];

        echo "Enter the number of accounts: ";
        $numAccounts = (int)readline();

        for ($i = 0; $i < $numAccounts; $i++) {
            echo "Enter account name for Account $i: ";
            $accountName = readline();
            echo "Enter account balance for Account $i: ";
            $accountBalance = (int)readline();
            $accounts[] = new Account($accountName, $accountBalance);
        }

        while (true) {
            echo "Enter source account index (0 to $numAccounts-1) or -1 to exit: ";
            $sourceIndex = (int)readline();

            if ($sourceIndex === -1) {
                echo "Bye!\n";
                break;
            }

            if ($sourceIndex >= 0 && $sourceIndex < $numAccounts) {
                echo "Enter destination account index (0 to $numAccounts-1): ";
                $destinationIndex = (int)readline();

                if ($destinationIndex >= 0 && $destinationIndex < $numAccounts) {
                    echo "Enter amount to transfer: ";
                    $amount = (int)readline();

                    $accounts[$sourceIndex]->transfer($accounts[$sourceIndex], $accounts[$destinationIndex], $amount);

                    // Display updated balances
                    foreach ($accounts as $account) {
                        /** @var Account $account
                         */
                        echo "{$account->getAccountName()} balance: " . $account->getBalance() . "\n";
                    }
                } else {
                    echo "Invalid destination account index.\n";
                }
            } else {
                echo "Invalid source account index.\n";
            }
        }
    }
}

accountTest::main();


