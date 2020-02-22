<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GroupMembers */
/* @var $form ActiveForm */
?>
<div class="site-groupMember">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'group_id') ?>
        <?= $form->field($model, 'user_id') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-groupMember -->
