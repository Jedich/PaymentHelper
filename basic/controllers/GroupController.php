<?php

namespace app\controllers;
use app\calculations\Calculations;
use app\models\GroupMembers;
use app\models\Payments;
class GroupController extends \yii\web\Controller {
    public function actionIndex() {
        return $this->render('index');
    }
}
