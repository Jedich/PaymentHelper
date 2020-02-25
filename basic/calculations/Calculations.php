<?php


namespace app\calculations;

use app\models\GroupsInfo;

class Calculations
{

    public function Calculations($payments, $members)
    {
        $iter = 0; //ітератор для кльового заукруглення
        $rounder = 0.01; //Округлення до найменших одиниць (Зручно коли використовувати номінали копійок чи купюр)
        $totalArray = []; // Підсумовані виплати (Коли один платить кілька разів, то це стає однією загальною виплатою)
        $totalSpent = 0; // Сумарно потрачені гроші за сеанс
        $middleSpent = 0; // Скільки мали би заплатити всі, якби платили би порівну
        $balanceChange = []; // Масив, що вказує наскільки повинен змінитись рахунок того що платив (Якщо
        //більше нуля, то йому винні, менше - він
        $balancePlus = []; // Масив для тих КОМУ винні
        $balanceMinus = []; // Масив для тих ХТО винен
        $debtArray = []; // Кінцевий очікуваний масив
        // Цей форіч формує $totalArray і $totalSpent
        foreach ($payments as $key) {
            foreach ($members as $member) {
                $sum = 0;
                if ($member == $key['user_id']) {
                    $sum += $key['cash'];
                    $totalArray[$member] += $sum;
                } else {
                    $totalArray[$member] += 0;
                }
                $totalSpent += $sum;
            }
        }


        // Розрахунок $middleSpent як середнє арифметичне
        $middleSpent = $totalSpent / count($members);

        //Розрахунок балансу з урахуванням долі платника групи
        foreach ($totalArray as $id => $value) {
            $balanceChange[$id] = $value - $middleSpent;
        }

        // Розподіл на підмасиви
        foreach ($balanceChange as $key => $value) {
            if ($value >= 0) {
                $balancePlus[$key] = $value;
            } else {
                $balanceMinus[$key] = $value;
            }
        }
        foreach ($balancePlus as $key1 => $value1) {
            $val1 = $value1;
            foreach ($balanceMinus as $key2 => $value2) {
                if ($val1 > 0) {
                    if ($val1 + $balanceMinus[$key2] < 0) {
                        if ($val1 <> 0) {
                            array_push($debtArray,
                                [$key2, $key1, round($val1/$rounder)*$rounder + $iter*$rounder]);
                            if(round($val1/$rounder)*$rounder>$val1){
                               $iter = 1-$iter;
                            } else { $iter = 0;}
                        }
                        $balanceMinus[$key2] = $value2 + $val1;
                        $val1 = 0;
                    } else {
                        if ($value2 <> 0) {
                            array_push($debtArray,
                                [$key2, $key1, -round($value2/$rounder)*$rounder + $iter*$rounder]);
                            if(round($val1/$rounder)*$rounder>$val1){
                                $iter = 1-$iter;
                            } else {$iter = 0;}
                        }
                        }
                        $val1 += $value2;
                        $balanceMinus[$key2] = 0;
                    }
                 else {
                    break;
                }
            }
        }
        print_r($debtArray);
        return $debtArray;

    }
}
