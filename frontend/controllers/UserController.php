<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\User;

class UserController extends Controller
{
    public function actionIndex()
    {
    	$data = [];

    	$data['users'] = User::find()->where(['type' => User::TYPE_FREELANCE])->all();
    	
        return $this->render('index', $data);
    }

    public function actionView($id)
    {
    	$data = [];

    	$data['user'] = User::find()->where(['username' => $id])->one();

        return $this->render('view', $data);
    }
}
