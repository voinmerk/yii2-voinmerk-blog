<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

use common\models\User;

/**
 * This is the model class for table "{{%portfolio}}".
 *
 * @property int $id
 * @property string $title
 * @property string $preview
 * @property string $content
 * @property string $image
 * @property string $slug
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property PortfolioImage[] $portfolioImages
 */
class Portfolio extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%portfolio}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'preview', 'content', 'image', 'slug', 'created_at', 'updated_at'], 'required'],
            [['preview', 'content'], 'string'],
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['title', 'image', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'title' => Yii::t('frontend', 'Title'),
            'preview' => Yii::t('frontend', 'Preview'),
            'content' => Yii::t('frontend', 'Content'),
            'image' => Yii::t('frontend', 'Image'),
            'slug' => Yii::t('frontend', 'Slug'),
            'created_by' => Yii::t('frontend', 'Created By'),
            'updated_by' => Yii::t('frontend', 'Updated By'),
            'created_at' => Yii::t('frontend', 'Created At'),
            'updated_at' => Yii::t('frontend', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getPortfolio()
    {
        return self::find()->joinWith(['portfolioImages'])->asArray()->all();
    }

    /**
     * {@inheritdoc}
     */
    public static function getPortfolioById($id)
    {
        return self::find()->joinWith(['portfolioImages'])->where(['portfolio.slug' => $id])->asArray()->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolioImages()
    {
        return $this->hasMany(PortfolioImage::className(), ['portfolio_id' => 'id']);
    }
}
