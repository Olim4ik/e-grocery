<?php

use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список заказов';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
	            <?= Html::a('Добавить заказ', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="box-body">
                <div class="order-index">
		            <?= GridView::widget([
			            'dataProvider' => $dataProvider,
			            'columns' => [
				            ['class' => SerialColumn::class], # numeration

//				            'id',
				            [
					            'attribute' => 'created_at',
                                'format' => ['datetime', 'php:d M Y H:i'],
                            ],
				            [
					            'attribute' => 'updated_at',
					            'format' => ['datetime', 'php:d M Y H:i'],
				            ],
				            'qty',
				            'total',
                            [
                                'attribute' => 'status',
                                'value' => static function ($data) {
                                    return !$data->status ? '<span class="text-red">Новый</span>' : '<span class="text-green">Завершен</span>'; # Активен
                                },
                                'format' => 'html',
                            ],
//				            'status',
//				            'name',
//				            'email:email',
//				            'phone',
//				            'address',
//				            'note:ntext',

				            [
                                'class' => ActionColumn::class,
                                'header' => 'Действия',
                            ], # actions
			            ],
		            ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>


