<?php

use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $orders View */
/* @var $products View */
/* @var $categories View */

$this->title = "Статистика магазина";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?= $orders ?></h3>
				<p>Заказов</p>
			</div>
			<div class="icon">
				<i class="fa fa-shopping-cart"></i>
			</div>
			<a href="<?= Url::to(['order/index']) ?>" class="small-box-footer">Перейти
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $products ?></h3>
                <p>Товаров</p>
            </div>
            <div class="icon">
                <i class="fa fa-cutlery"></i>
            </div>
            <a href="<?= Url::to(['product/index']) ?>" class="small-box-footer">Перейти
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


</div>

