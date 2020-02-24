<?php


namespace app\calculations;

use app\models\GroupsInfo;

class Calculations
{

    public function Calculations($payments, $members)
    {
        $summary = [];
        $debtSum = 0;
        $debt = 0;
        $summaryPlus = [];
        $summaryMinus = [];
        $debtArray = [];
        $superSummary = [];
        foreach ($payments as $key) {
            foreach ($members as $member) {
                $sum = 0;
                if ($member == $key['user_id']) {
                    $sum += $key['cash'];
                    $summary[$member] += $sum;
                } else {
                    $summary[$member] += 0;
                }
                $debtSum += $sum;
            }
        }
        /* foreach ($summary as $value) {
             $debtSum += $value;
         }*/
        $debt = $debtSum / count($members);

        foreach ($summary as $id => $value) {
            $superSummary[$id] = $value - $debt;
        }


        foreach ($superSummary as $key => $value) {
            if ($value >= 0) {
                $summaryPlus[$key] = $value;
            } else {
                $summaryMinus[$key] = $value;
            }
        }
        foreach ($summaryPlus as $key1 => $value1) {
            $val1 = $value1;
            foreach ($summaryMinus as $key2 => $value2) {
                if ($val1 > 0) {
                    if ($val1 + $summaryMinus[$key2] < 0) {
                        if ($val1 <> 0) {
                            array_push($debtArray, [$key2, $key1, $val1]);
                        }
                        $summaryMinus[$key2] = $value2 + $val1;
                        $val1 = 0;
                    } else {
                        if ($value2 <> 0) {
                            array_push($debtArray, [$key2, $key1, -$value2]);
                        }
                        $val1 += $value2;
                        $summaryMinus[$key2] = 0;
                    }
                } else {
                    break;
                }
            }
        }
        return $debtArray;
    }
}
