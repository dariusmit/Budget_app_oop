<?php

declare(strict_types=1);

namespace Drago\Mvc1\Models;

class TotalsModel {

    private array $totals = ['Income' => 0, 'Expense' => 0, 'Net' => 0];

    public function calcTotals($amounts) {

        foreach ($amounts as $amount) {
            if ($amount > 0) {
                $this->totals['Income'] += $amount;
            }
        }

        foreach ($amounts as $amount) {
            if ($amount < 0) {
                $this->totals['Expense'] += abs($amount);
            }
        }

        foreach ($amounts as $amount) {

            $this->totals['Net'] = $this->totals['Income'] + $this->totals['Expense'];

        }

    }

    public function getTotals() {

        return $this->totals;

    }

}