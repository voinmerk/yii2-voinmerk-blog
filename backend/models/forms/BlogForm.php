<?php
namespace backend\models\forms;

use Yii;
use yii\base\Model;

use backend\models\Blog;

/**
 * BlogForm class
 */
class BlogForm extends Model
{
	public $title;
	public $preview_content;
	public $content;
	public $meta_title;
	public $meta_keywords;
	public $meta_description;
	public $status;

	/**
     * {@inheritdoc}
     */
	public function rules()
	{
		return [
			[['title', 'preview_content', 'content', 'meta_title', 'meta_keywords', 'meta_description'], 'required'],
			[['title', 'meta_title'], 'string', 'max' => 255],
			[['preview_content', 'content', 'meta_keywords', 'meta_description'], 'string'],
			[['status'], 'integer'],
		];
	}

	/**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('backend', 'Title'),
            'content' => Yii::t('backend', 'Content'),
            'preview_content' => Yii::t('backend', 'Preview Content'),
            'meta_title' => Yii::t('backend', 'Meta Title'),
            'meta_keywords' => Yii::t('backend', 'Meta Keywords'),
            'meta_description' => Yii::t('backend', 'Meta Description'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }

    /**
     * {@inheritdoc}
     */
	public function createBlog()
	{
		$blog = new Blog();

		if (!$this->validate()) {
            return null;
        }
        
		$blog->title = $this->title;
		$blog->content = $this->content;
		$blog->preview_content = $this->preview_content;
		$blog->meta_title = $this->meta_title;
		$blog->meta_keywords = $this->meta_keywords;
		$blog->meta_description = $this->meta_description;
		$blog->status = $this->status;

		return $blog->save() ? $blog : null;
	}

	public function loadData($model)
	{
		$this->attributes = $model->attributes;
	}

	/**
     * {@inheritdoc}
     */
	public function updateBlog($id)
	{
		$blog = Blog::findOne($id);

		if (!$this->validate()) {
            return null;
        }

		$blog->title = $this->title;
		$blog->content = $this->content;
		$blog->preview_content = $this->preview_content;
		$blog->meta_title = $this->meta_title;
		$blog->meta_keywords = $this->meta_keywords;
		$blog->meta_description = $this->meta_description;
		$blog->status = $this->status;

		return $blog->save() ? $blog : null;
	}
}