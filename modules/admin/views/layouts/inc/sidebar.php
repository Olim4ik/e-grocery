<?php

use yii\helpers\Url;

?>
<aside class="main-sidebar">

    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">

            <li class="header"><b>Grocery . Admin . Panel</b></li>
            <li class="active"><a href="<?= \yii\helpers\Url::to(['main/index']) ?>"><i class="fa fa-bar-chart"></i>
                    <span>Статистика магазина</span></a></li>
<!--            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>-->
            <li class="treeview">
                <a href="#"><i class="fa fa-shopping-cart"></i> <span>Заказы</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= Url::to(['order/index']) ?>">Список заказов</a></li>
                    <li><a href="<?= Url::to(['order/create']) ?>">Добавить заказ</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-cubes"></i> <span>Категории</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= Url::to(['category/index']) ?>">Список категорий</a></li>
                    <li><a href="<?= Url::to(['category/create']) ?>">Добавить категорию</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-cutlery"></i> <span>Товары</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= Url::to(['product/index']) ?>">Список товаров</a></li>
                    <li><a href="<?= Url::to(['product/create']) ?>">Добавить товар</a></li>
                </ul>
            </li>
        </ul>
    </section>

</aside>