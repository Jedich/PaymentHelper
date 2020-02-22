<?php


namespace app\calculations;

use app\models\GroupsInfo;

class Calculations
{

    public function Calculations($payments, $members)
    {
        $summary = [];
        $sum = 0;
        $debtSum = 0;
        $debt = 0;
        $summaryPlus = [];
        $summaryMinus = [];
        $debtArray = [];
        $superSummary = [];
        /* foreach ($payments as $key => $value) { */
        foreach ($payments as $key) {
            foreach ($members as $member) {
                $sum = 0;
                if ($member == $key[0]) {
                    $sum += $key[1];
                }
                $summary[$member] = $sum;
            }
        }
        foreach ($summary as $value) {
            $debtSum += $value;
        }
        $debt = $debtSum / count($members);
        foreach ($summary as $id => $value) {
          //  $value -= $debt;
            $superSummary[$id] = $value-$debt;
        }
        foreach ($superSummary as $key => $value) {
            if ($value >= 0) {
                $summaryPlus[$key] = $value;
            } else {
                $summaryMinus[$key] = $value;
            }
        }
        foreach ($summaryPlus as $key1 => $value1) {
            foreach ($summaryMinus as $key2 => $value2) {
                if ($value1 >= 0) {
                    if ($value1 += $value2 < 0) {
                        $summaryMinus[$key2] = $value2 + $value1;
                        $value1 = 0;
                    } else {
                        $summaryPlus[$key1] = $value1 + $value2;
                    }
                    array_push($debtArray, [$key2, $key1, -$value2]);
                } else {
                    break;
                }
            }
        }
        return $debtArray;
    }
}
