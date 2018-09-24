<?php
namespace frontend\controllers;

use Yii;

class BlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$data = [];

        return $this->render('index', $data);
    }
}
