<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

// use frontend\models\Portfolio;

/**
 * PortfolioController class
 */
class PortfolioController extends Controller
{
	public function actionIndex()
	{
		$data = [];

		$this->render('index', $data);
	}

	public function actionView($id)
	{
		$data = [];

		$this->render('view', $data);
	}
}