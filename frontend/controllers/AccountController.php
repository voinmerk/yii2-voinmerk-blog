<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class AccountController extends Controller
{
	/**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index', 'resume', 'portfolio', 'service', 'setting'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $data = [];

        $data['user'] = Yii::$app->user->identity;

        $data['model'] = \common\models\User::findOne(Yii::$app->user->identity->id);

        return $this->render('index', $data);
    }

    public function actionResume()
    {
        $data = [];

        $data['user'] = Yii::$app->user->identity;

        return $this->render('resume', $data);
    }

    public function actionPortfolio()
    {
        $data = [];

        $data['user'] = Yii::$app->user->identity;

        return $this->render('portfolio', $data);
    }

    public function actionService()
    {
        $data = [];

        $data['user'] = Yii::$app->user->identity;

        return $this->render('service', $data);
    }

    public function actionSetting()
    {
        $data = [];

        $data['user'] = Yii::$app->user->identity;

        return $this->render('setting', $data);
    }
}
