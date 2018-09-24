<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

use frontend\models\Portfolio;

/**
 * PortfolioController class
 */
class PortfolioController extends Controller
{
	public function actionIndex()
	{
		$data = [];

		return $this->render('index', $data);
	}

	public function actionView($id)
	{
		$data = [];

		if(Yii::$app->request->isAjax) {
			$data['portfolio'] = Portfolio::getPortfolioById($id);

			return $this->renderAjax('ajax/view', $data);
		}

		return $this->render('view', $data);
	}
}