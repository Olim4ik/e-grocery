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
                    <li><a href="<?= \yii\helpers\Url::to(['order/index']) ?>">Список заказов</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['order/create']) ?>">Добавить заказ</a></li>
                </ul>
            </li>

        </ul>
    </section>

</aside>