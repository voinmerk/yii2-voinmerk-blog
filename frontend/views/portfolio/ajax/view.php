<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div id="custom-content" class="white-popup-block" style="max-width:800px; margin: 20px auto;">
    <h1 class="test"><?= $portfolio['title'] ?></h1>

    <style>
    	#custom-content img {
    		max-width: 100%;
    		margin-bottom: 10px;
    	}
    </style>

    <?= $portfolio['content'] ?>
    
   	<?= Html::a($portfolio['site_link'], $portfolio['site_link'], ['target' => '_blank']) ?>

   	<?php if(count($portfolio['portfolioImages'])) { ?>
   	<?php foreach($portfolio['portfolioImages'] as $image) { ?>
   	<?= Html::img('@web/' . $image['src'], ['class' => 'thumbnail','style' => 'width: 100%;margin-top:30px;', 'alt' => $image['alt'], 'title' => $image['title']]) ?>
   	<?php } ?>
   	<?php } ?>
</div>