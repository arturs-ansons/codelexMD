<?php declare(strict_types=1);

class SavingsAccount {

    private int $initialBalance;
    private int $annualInterestRate;
    private int $months;
    private int $monthlyDeposits;
    private int $monthlyWithdrawals;
    private string $name;

    public function __construct($initialBalance, $annualInterestRate, $months, $name) {
        $this->initialBalance = $initialBalance;
        $this->annualInterestRate = $annualInterestRate / 100; // Convert annual interest rate to decimal
        $this->months = $months;
        $this->monthlyDeposits = [];
        $this->monthlyWithdrawals = [];
        $this->name = $name;
    }

    public function addMonthlyDeposit($month, $amount) {
        $this->monthlyDeposits[$month] = $amount;
    }

    public function addMonthlyWithdrawal($month, $amount) {
        $this->monthlyWithdrawals[$month] = $amount;
    }

    public function calculateTotalDeposits() {
        return array_sum($this->monthlyDeposits);
    }

    public function calculateTotalWithdrawals() {
        return array_sum($this->monthlyWithdrawals);
    }

    public function calculateInterestEarned() {
        $totalDeposits = $this->calculateTotalDeposits();
        $totalWithdrawals = $this->calculateTotalWithdrawals();
        $principal = $this->initialBalance + $totalDeposits - $totalWithdrawals;

        $interest = 0;
        for ($month = 1; $month <= $this->months; $month++) {
            $monthlyBalance = $principal + $this->monthlyDeposits[$month] - $this->monthlyWithdrawals[$month];
            $monthlyInterest = ($monthlyBalance * ($this->annualInterestRate / 12)); // Calculate monthly interest
            $interest += $monthlyInterest;
            $principal = $monthlyBalance + $monthlyInterest; // Add monthly interest to the principal
        }

        return $interest;
    }

    public function calculateEndingBalance() {
        $totalDeposits = $this->calculateTotalDeposits();
        $totalWithdrawals = $this->calculateTotalWithdrawals();
        $interest = $this->calculateInterestEarned();
        return $this->initialBalance + $totalDeposits - $totalWithdrawals + $interest;
    }
    public function show_user_name_and_balance(): string
    {
        $balance = $this->calculateEndingBalance();
        $formattedBalance = number_format($balance, 2);

        if ($balance >= 0) {
            return "$this->name, $formattedBalance";
        } else {
            // For negative balance, display the - sign before the dollar sign
            return "$this->name, $formattedBalance";
        }
    }
}

echo "Enter your name: ";
$name = trim(fgets(STDIN));

echo "How much money is in the account?: ";
$initialBalance = (float)trim(fgets(STDIN));

echo "Enter the annual interest rate: ";
$annualInterestRate = (float)trim(fgets(STDIN));

echo "How long has the account been opened? ";
$months = (int)trim(fgets(STDIN));

$savingsAccount = new SavingsAccount($initialBalance, $annualInterestRate, $months, $name);

for ($month = 1; $month <= $months; $month++) {
    echo "Enter amount deposited for month $month: ";
    $deposit = (float)trim(fgets(STDIN));
    $savingsAccount->addMonthlyDeposit($month, $deposit);

    echo "Enter amount withdrawn for month $month: ";
    $withdrawal = (float)trim(fgets(STDIN));
    $savingsAccount->addMonthlyWithdrawal($month, $withdrawal);
}

$totalDeposits = number_format($savingsAccount->calculateTotalDeposits(), 2);
$totalWithdrawals = number_format($savingsAccount->calculateTotalWithdrawals(), 2);
$interestEarned = number_format($savingsAccount->calculateInterestEarned(), 2);
$endingBalance = number_format($savingsAccount->calculateEndingBalance(), 2);

echo "Total deposited: $$totalDeposits\n";
echo "Total withdrawn: $$totalWithdrawals\n";
echo "Interest earned: $$interestEarned\n";
echo "Ending balance: $$endingBalance\n";
echo $savingsAccount->show_user_name_and_balance() . "\n";

