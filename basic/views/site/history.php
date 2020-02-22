<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'History';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-history">
    <h1>Actions history</h1>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Where?</th>
            <th>Who?</th>
            <th>Sum</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>1</th>
            <td>Otto</td>
            <td>Angry Beavers</td>
            <td>120</td>
        </tr>
        </tbody>
    </table>
</div>
