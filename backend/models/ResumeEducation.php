<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%resume_education}}".
 *
 * @property int $id
 * @property int $resume_id
 * @property string $institute
 * @property string $faculty
 * @property string $profession
 * @property string $city
 * @property int $format
 * @property string $start_date
 * @property string $end_date
 *
 * @property Resume $resume
 */
class ResumeEducation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%resume_education}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resume_id', 'institute', 'faculty', 'profession', 'city', 'format', 'start_date', 'end_date'], 'required'],
            [['resume_id', 'format'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['institute', 'faculty', 'profession', 'city'], 'string', 'max' => 255],
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
            'institute' => Yii::t('backend', 'Institute'),
            'faculty' => Yii::t('backend', 'Faculty'),
            'profession' => Yii::t('backend', 'Profession'),
            'city' => Yii::t('backend', 'City'),
            'format' => Yii::t('backend', 'Format'),
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
