<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = 'Редактирование Товара: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!--            <div class="box-header with-border">-->
            <!--            </div>-->
            <div class="box-body">
                <div class="product-update">
					<?= $this->render('_form', [
						'model' => $model,
					]) ?>
                </div>
            </div>
        </div>
    </div>
</div>