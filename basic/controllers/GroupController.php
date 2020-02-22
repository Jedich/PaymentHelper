<?php

namespace app\controllers;
use app\models\GroupMembers;
class GroupController extends \yii\web\Controller {
    public function actionIndex() {
        return $this->render('index');
    }
    public function actionCalculate($group_id) {
    	$members = GroupMembers::find()->where(["group_id" => $group_id]);
    	$payments = GroupMembers::find()->all();
    	$calculation = new Calculations();
    	$calculation->Calculations($payments, $members);
	}
}
