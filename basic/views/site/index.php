<?php

/* @var $this yii\web\View */
/* @var $groups */


use yii\helpers\Url;

//var_dump($groups);

?>

<div class="site-index">
    <div class="row">
        <div class="col-xs-6 col-md-4 col-lg-3">
            <ul class="list-group col-xs-5 col-sm-4 col-md-3 col-lg-2" style="position: fixed;">
                <?php if (isset($groups)){
                    foreach ($groups as $key=>$value) {  ?>
                    <a href="<?= Url::to(['info', 'groupId' => $key])?>" class="list-group-item"><?= $value ?></a>
                <?php }} ?>
            </ul>

        </div>
        <?php if (isset($groupInfo)): ?>
        <section class="container-fluid">
               <div class="">
                    <h4>Group info</h4>
               </div>
        </section>
        <?php endif; ?>
    </div>
</div>
