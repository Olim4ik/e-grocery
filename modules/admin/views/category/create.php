<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = 'Добавление категориии: ';
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!--            <div class="box-header with-border">-->
            <!--            </div>-->
            <div class="box-body">
                <div class="category-create">
					<?= $this->render('_form', [
						'model' => $model,
					]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
