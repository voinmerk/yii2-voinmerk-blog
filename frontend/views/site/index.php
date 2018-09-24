<?php

use yii\helpers\Url;
use yii\helpers\Html;

$js = <<<JS
$('.image-popup-no-margins').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
        verticalFit: true
    },
    zoom: {
        enabled: true,
        duration: 300 // don't foget to change the duration also in CSS
    }
});
$('.ajax-popup').magnificPopup({
    type: 'ajax',
    alignTop: true,
    overflowY: 'scroll'
});
JS;

$this->registerJs($js);

$this->title = 'Веб-разработчик';
?>
<div class="site-index">

    <div class="banner">
        <h1>Сайт под ключ <span style="color: #ff941b;">недорого</span>!</h1>
    </div>

    <div class="container">
        <div class="jumbotron">
            <h1>Добро пожаловать!</h1>

            <p class="lead">Разработка, продвижение и адаптация веб-приложения</p>

            <p><a class="btn btn-lg btn-success" href="https://vk.com/voinmerk" target="_blank">Связаться</a></p>
        </div>

        <div class="body-content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Мои проекты</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php if(count($portfolios)) { ?>
                <?php foreach($portfolios as $portfolio) { ?>
                <div class="col-lg-4">
                    <div class="card clearfix">
                        <h4><?= $portfolio['title'] ?></h4>

                        <?= $portfolio['preview'] ?>

                        <p><?= Html::a(Html::img('@web/' . $portfolio['image'], ['style' => 'width: 100%;']), '@web/' . $portfolio['image'], ['class' => 'image-popup-no-margins']) ?></p>

                        <p><?= Html::a('Просмотреть &raquo;', Url::to(['portfolio/view', 'id' => $portfolio['slug']]), ['class' => 'ajax-popup btn btn-link pull-right']) ?></p>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
