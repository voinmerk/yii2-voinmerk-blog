<?php

namespace backend\controllers;

use Yii;
use backend\models\Blog;
use backend\models\BlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\forms\BlogForm;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
{
    private $request;
    private $session;

    /**
     * @inheritdoc
     */
    public function __construct($id, $module, $config = [])
    {
        $this->request = Yii::$app->request;
        $this->session = Yii::$app->session;

        parent::__construct($id, $module, $config);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $data = [];

        if($this->session->hasFlash('success')) {
            $data['success'] = $this->session->getFlash('success');
        }

        $searchModel = new BlogSearch();
        $data['dataProvider'] = $searchModel->search($this->request->queryParams);
        $data['searchModel'] = $searchModel;

        return $this->render('index', $data);
    }

    /**
     * Displays a single Blog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $data = [];

        $blog = new BlogForm();

        if ($blog->load($this->request->post())) {
            if ($result = $blog->createBlog()) {
                $this->session->setFlash('success', 'Материал успешно создан!');

                return $this->redirect(['index']);
            } else {
                $data['error_warning'] = 'Ошибка, что... Ошибка, а... Да, ошибка, что...';
            }
        }

        $data['blog'] = $blog;

        return $this->render('create', $data);
    }

    /**
     * Updates an existing Blog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $data = [];

        $blog = new BlogForm();
        $blog->loadData(Blog::findOne($id));

        if ($blog->load($this->request->post())) {
            if ($result = $blog->updateBlog($id)) {
                $this->session->setFlash('success', 'Материал успешно обновлён!');

                return $this->redirect(['index']);
            } else {
                $data['error_warning'] = 'Ошибка, что... Ошибка, а... Да, ошибка, что...';
            }
        }

        $data['blog'] = new BlogForm();
        $data['model'] = Blog::findOne($id);

        return $this->render('update', $data);
    }

    /**
     * Deletes an existing Blog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
