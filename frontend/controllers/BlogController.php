<?php
namespace frontend\controllers;

use Yii;
use frontend\models\Blog;
use frontend\models\Category;

class BlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$data = [];

    	// $data['blogs'] = Blog::getBlogs();
    	$data['categories'] = Category::getCategoryTree();

        return $this->render('index', $data);
    }

    public function actionCategory($category)
    {
    	$data = [];

    	// $data['blogs'] = Blog::getBlogByCategoryId($category);
    	// $data['categories'] = Category::getCategoryTree();

        return $this->render('index', $data);
    }

    public function actionView($category, $blog)
    {
    	$data = [];

    	// $data['blogs'] = Blog::getBlogById($blog);
    	// $data['category'] = Category::getCategoryById($category);
    	// $data['categories'] = Category::getCategoryTree();

        return $this->render('index', $data);
    }
}
