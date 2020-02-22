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
    	$members = GroupMembers::find()->where(["group_id" => $group_id])->all();
    	$paymentsFull = Payments::find()->where(["group_id" => $group_id])->all();
    	$payments = [];
    	foreach ($paymentsFull as $payment)
    		array_push($payments, [$payment['user_id'], $payment['cash']]);
    	//$calculation = new Calculations();
    	//$calculation->Calculations($payments, $members);
		print_r($payments);
		return $this->render('index', [
			'model' => $payments,
		]);
	}
}
