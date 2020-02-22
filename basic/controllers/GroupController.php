<?php

namespace app\controllers;
use app\calculations\Calculations;
use app\models\GroupMembers;
use app\models\Payments;
class GroupController extends \yii\web\Controller {
    public function actionIndex() {
        return $this->render('index');
    }
    public function actionCalculate($group_id) {
    	$membersFull = GroupMembers::find()->where(["group_id" => $group_id])->all();
    	$paymentsFull = Payments::find()->where(["group_id" => $group_id])->all();
    	$payments = [];
    	$members= [];
    	foreach ($paymentsFull as $payment)
    		array_push($payments, [$payment['user_id'], $payment['cash']]);
    	foreach($membersFull as $member)
    		array_push($members, $member['user_id']);
    	$calculation = new Calculations();
    	$debt = $calculation->Calculations($payments, $members);
		//json_encode()
		print_r($debt);
		return $this->render('index', [
			'model' => $payments,
		]);
	}
}
