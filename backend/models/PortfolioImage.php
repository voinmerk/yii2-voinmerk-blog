<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%portfolio_image}}".
 *
 * @property int $id
 * @property int $portfolio_id
 * @property string $src
 * @property string $title
 * @property string $alt
 *
 * @property Portfolio $portfolio
 */
class PortfolioImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%portfolio_image}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['portfolio_id', 'src', 'title', 'alt'], 'required'],
            [['portfolio_id'], 'integer'],
            [['alt'], 'string'],
            [['src', 'title'], 'string', 'max' => 255],
            [['portfolio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Portfolio::className(), 'targetAttribute' => ['portfolio_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'portfolio_id' => Yii::t('backend', 'Portfolio ID'),
            'src' => Yii::t('backend', 'Src'),
            'title' => Yii::t('backend', 'Title'),
            'alt' => Yii::t('backend', 'Alt'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['id' => 'portfolio_id']);
    }
}
