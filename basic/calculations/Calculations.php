<?php


namespace app\calculations;

use app\models\GroupsInfo;

class Calculations
{

    public function Calculations($payments, $members)
    {
        $summary = [];
        // $sum = 0;
        $debtSum = 0;
        $debt = 0;
        $summaryPlus = [];
        $summaryMinus = [];
        $debtArray = [];
        $superSummary = [];
        foreach ($payments as $key) {
            foreach ($members as $member) {
                $sum = 0;
                if ($member == $key[0]) {
                    $sum += $key[1];
                    $summary[$member] += $sum;
                } else {
                    $summary[$member] += 0;
                }
            }
        }
        foreach ($summary as $value) {
            $debtSum += $value;
        }
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
        // print_r($superSummary);
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
                    /*  if ($value2 <> 0) {
                          array_push($debtArray, [$key2, $key1, -$value2]);
                      }*/
                } else {
                    break;
                }
            }
        }
        /*   foreach ($summaryPlus as $key1 => $value1) {
               foreach ($summaryMinus as $key2 => $value2) {
                   if($value1 > 0){
                       if($value1+$)
                   }
               }
           }*/
        return $debtArray;
    }
}
