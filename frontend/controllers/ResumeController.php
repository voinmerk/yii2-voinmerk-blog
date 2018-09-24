<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

use frontend\models\Resume;

/**
 * ResumeController class
 */
class ResumeController extends Controller
{
	public function actionIndex()
	{
		$data = [];

		$data['resumes'] = Resume::getResumeAll();

		return $this->render('index', $data);
	}

	public function actionView($id)
	{
		$data = [];

		$data['resume'] = Resume::getResumeOne($id);

		return $this->render('view', $data);
	}
}