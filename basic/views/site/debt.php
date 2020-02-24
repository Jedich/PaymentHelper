<?php

/* @var $this yii\web\View */
/* @var $table */

use yii\helpers\Html;

$this->title = 'Debt receipt';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-debt">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Whom?</th>
                <th>Where?</th>
                <th>Sum</th>
            </tr>
        </thead>
            <tbody>
            <?php foreach($table as $tableColumn) { ?>
                <tr>
                    <td><?=$tableColumn[0]?></td>
                    <td><?=$tableColumn[1]?></td>
                    <td><?=$tableColumn[2]?></td>
                </tr>
            <?php } ?>
            </tbody>
    </table>
</div>
