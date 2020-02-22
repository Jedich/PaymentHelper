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
        /* foreach ($payments as $key => $value) { */
        foreach ($payments as $key){
            foreach ($members as $member) {
                if ($member = $key[0]) {
                    $sum += $key[1];
                }
                $summary[$member] = $sum;
                $sum = 0;
            }}
        foreach ($summary as $value) {
            $debtSum += $value;
        }
        $debt = $debtSum / count($members);
        foreach ($summary as $value) {
            $value -= $debt;
        }
        foreach ($summary as $key => $value) {
            if ($value >= 0) {
                $summaryPlus[$key] = $value;
            } else {
                $summaryMinus[$key] = $value;
            }
        }
        foreach ($summaryPlus as $key1 => $value1) {
			if($key1=0){echo "dupa";} else {echo $key1;}
            foreach ($summaryMinus as $key2 => $value2) {

                if ($value1 > 0) {
                    if ($value1 += $value2 < 0) {
                        $value2 += $value1;
                        $value1 = 0;
                    } else {
                        $value1 += $value2;
                    }

					array_push($debtArray, [$key2, $key1, $value2]);
				} else {
					break;
				}
			}
		}
		return $debtArray;
    }
}
