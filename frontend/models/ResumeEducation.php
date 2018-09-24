<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%resume_education}}".
 *
 * @property int $id
 * @property int $resume_id
 * @property string $institute
 * @property string $faculty
 * @property string $profession
 * @property int $format
 * @property string $start_date
 * @property string $end_date
 *
 * @property Resume $resume
 */
class ResumeEducation extends ActiveRecord
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
            [['resume_id', 'institute', 'faculty', 'profession', 'format', 'start_date', 'end_date'], 'required'],
            [['resume_id', 'format'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['institute', 'faculty', 'profession'], 'string', 'max' => 255],
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
            'institute' => Yii::t('frontend', 'Institute'),
            'faculty' => Yii::t('frontend', 'Faculty'),
            'profession' => Yii::t('frontend', 'Profession'),
            'format' => Yii::t('frontend', 'Format'),
            'start_date' => Yii::t('frontend', 'Start Date'),
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
