<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Debt receipt';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-debt">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Who?</th>
                <th>Whom?</th>
                <th>Where?</th>
                <th>Sum</th>
            </tr>
        </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Angry Beavers</td>
                    <td>120</td>
                </tr>
            </tbody>
    </table>
</div>
