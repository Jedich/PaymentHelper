<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DebtInfo */
/* @var $form ActiveForm */
?>
<div class="site-debtInfo">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'group_id') ?>
        <?= $form->field($model, 'user1_id') ?>
        <?= $form->field($model, 'user2_id') ?>
        <?= $form->field($model, 'sum') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-debtInfo -->
