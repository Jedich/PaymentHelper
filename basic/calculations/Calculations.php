<?php


namespace app\calculations;

use app\models\GroupsInfo;

class Calculations
{

    public function Calculations($payments, $members)
    {
        $summary = null;
        $sum = 0;
        $debtSum = 0;
        $debt = 0;
        $summaryPlus = 0;
        $summaryMinus = 0;
        $debtArray = 0;
        foreach ($payments as $key => $value) {
            foreach ($members as $member) {
                if ($member = $key) {
                    $sum += $value;
                }
                $summary[] = [$member => $sum];
                $sum = 0;
            }
        }
        foreach ($summary as $value) {
            $debtSum += $value;
        }
        $debt = $debtSum / count($members);
        foreach ($summary as $value) {
            $value -= $debt;
        }
        foreach ($summary as $key => $value) {
            if ($value >= 0) {
                $summaryPlus[] = [$key => $value];
            } else {
                $summaryMinus[] = [$key => $value];
            }
        }
        foreach ($summaryPlus as $key1 => $value1) {
            foreach ($summaryMinus as $key2 => $value2) {
                if ($value1 > 0) {
                    if ($value1 += $value2 < 0) {
                        $value2 += $value1;
                        $value1 = 0;
                    } else {
                        $value1 += $value2;
                    }
                    $debtArray[] = [[$key2, $key1, $value2]];
                } else {
                    break;
                }
            }
        }
        return $debtArray;
    }
}