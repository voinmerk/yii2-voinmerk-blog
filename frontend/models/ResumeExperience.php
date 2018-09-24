<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%resume_experience}}".
 *
 * @property int $id
 * @property int $resume_id
 * @property string $position
 * @property string $organization
 * @property string $stert_date
 * @property string $end_date
 *
 * @property Resume $resume
 */
class ResumeExperience extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%resume_experience}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resume_id', 'position', 'organization', 'stert_date', 'end_date'], 'required'],
            [['resume_id'], 'integer'],
            [['stert_date', 'end_date'], 'safe'],
            [['position', 'organization'], 'string', 'max' => 255],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::className(), 'targetAttribute' => ['resume_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'resume_id' => Yii::t('frontend', 'Resume ID'),
            'position' => Yii::t('frontend', 'Position'),
            'organization' => Yii::t('frontend', 'Organization'),
            'stert_date' => Yii::t('frontend', 'Stert Date'),
            'end_date' => Yii::t('frontend', 'End Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResume()
    {
        return $this->hasOne(Resume::className(), ['id' => 'resume_id']);
    }
}
