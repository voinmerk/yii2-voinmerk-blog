<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%resume_experience}}".
 *
 * @property int $id
 * @property int $resume_id
 * @property string $position
 * @property string $organization
 * @property string $city
 * @property string $start_date
 * @property string $end_date
 *
 * @property Resume $resume
 */
class ResumeExperience extends \yii\db\ActiveRecord
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
            [['resume_id', 'position', 'organization', 'city', 'start_date', 'end_date'], 'required'],
            [['resume_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['position', 'organization', 'city'], 'string', 'max' => 255],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::className(), 'targetAttribute' => ['resume_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'resume_id' => Yii::t('backend', 'Resume ID'),
            'position' => Yii::t('backend', 'Position'),
            'organization' => Yii::t('backend', 'Organization'),
            'city' => Yii::t('backend', 'City'),
            'start_date' => Yii::t('backend', 'Start Date'),
            'end_date' => Yii::t('backend', 'End Date'),
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
