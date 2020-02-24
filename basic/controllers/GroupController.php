<?php

namespace app\controllers;
use app\calculations\Calculations;
use app\models\GroupMembers;
use app\models\Payments;
use app\models\DebtInfo;
class GroupController extends \yii\web\Controller {
    public function actionIndex() {
        return $this->render('index');
    }
	public function actionCalculate($group_id) {
		$membersTemp = GroupMembers::find()->select('user_id')->where(["group_id" => $group_id])->asArray()->all();
		$payments = Payments::find()->select(['user_id', 'cash'])->where(["group_id" => $group_id])->asArray()->all();
		$members = [];
		foreach($membersTemp as $member)
			array_push($members, $member['user_id']);
		$calculation = new Calculations();
		$debt = $calculation->Calculations($payments, $members);
		foreach($debt as $debtPiece) {
			$model = new DebtInfo();
			$model->group_id = $group_id;
			$model->user1_id = $debtPiece[0];
			$model->user2_id = $debtPiece[1];
			$model->sum = $debtPiece[2];
			$model->save();
		}
		Payments::deleteAll(["group_id" => $group_id]);
		print_r("a");
		return $this->render('index', [
			'debt' => $debt,
		]);
	}
	public function actionAddPayment() {

	}
}
