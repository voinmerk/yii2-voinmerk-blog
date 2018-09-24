<?php

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
                <div class="col-lg-4">
                    <div class="card clearfix">
                        <h3>ТД ЮГ-элеватор - Сайт</h3>

                        <p>Разработка сайта для особо крупной компании в украине. ЮГ Элеватор - завод элеваторного оборудования. Сайт был разработан на платформе wordpress.</p>

                        <p><?= Html::a(Html::img('@web/img/td-ugelevator-home.jpg', ['style' => 'width: 100%;']), '@web/img/td-ugelevator-home.jpg', ['class' => 'image-popup-no-margins']) ?></p>

                        <p><a class="btn btn-link pull-right" href="http://td-ugelevator.com" target="_blank">Посмотреть &raquo;</a></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card clearfix">
                        <h3>НППК - Сенсорный сайт</h3>

                        <p>Разработан на Yii2 Framework. Сайт для информационной доски Новосибирского профессионально-педагогического колледжа.</p>

                        <p><?= Html::a(Html::img('@web/img/nppk-home.png', ['style' => 'width: 100%;']), '@web/img/nppk-home.png', ['class' => 'image-popup-no-margins']) ?></p>

                        <p><a class="btn btn-link pull-right" href="http://info.nppk54.ru" target="_blank">Посмотреть &raquo;</a></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card clearfix">
                        <h3>Cristalix Project - Форум</h3>

                        <p>Разработан на форумной платформе Xenforo 1.4.3</p>

                        <p><?= Html::a(Html::img('@web/img/cristalix-home.jpg', ['style' => 'width: 100%;']), '@web/img/cristalix-home.jpg', ['class' => 'image-popup-no-margins']) ?></p>

                        <p><a class="btn btn-link pull-right" href="http://xenforo.cristalix.voinmerk.ru" target="_blank">Посмотреть &raquo;</a></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card clearfix">
                        <h3>Amazonia RP - Сайт</h3>

                        <p>Разработан на движке Yii2 Framework. Сайт, пока мало известного игрового проекта.</p>

                        <p><?= Html::a(Html::img('@web/img/amazonia-home.png', ['style' => 'width: 100%;']), '@web/img/amazonia-home.png', ['class' => 'image-popup-no-margins']) ?></p>

                        <p><a class="btn btn-link pull-right" href="http://yii.amazonia.voinmerk.ru" target="_blank">Посмотреть &raquo;</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
