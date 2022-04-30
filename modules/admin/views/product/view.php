<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
				<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
				<?= Html::a('Delete', ['delete', 'id' => $model->id], [
					'class' => 'btn btn-danger',
					'data' => [
						'confirm' => 'Are you sure you want to delete this item?',
						'method' => 'post',
					],
				]) ?>
            </div>
            <div class="box-body">
                <div class="product-view">
					<?= DetailView::widget([
						'model' => $model,
						'attributes' => [
							'id',
							'category_id',
							'title',
							'content:html',
							'price',
							'old_price',
							'description',
							'keywords',
							//'img',
                            [
                                'attribute' => 'img',
                                'value' => $model->img ? '/products/' . $model->img : "/products/no-image.png", #  ? Html::img($model->img) : null,
                                'format' => ['image', ['width' => '100', 'height' => '100']],
                            ],
							'is_offer',
						],
					]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
