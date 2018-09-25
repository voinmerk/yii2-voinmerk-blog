<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%resume_skill}}".
 *
 * @property int $id
 * @property int $resume_id
 * @property string $content
 *
 * @property Resume $resume
 */
class ResumeSkill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%resume_skill}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resume_id', 'content'], 'required'],
            [['resume_id'], 'integer'],
            [['content'], 'string'],
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
            'content' => Yii::t('backend', 'Content'),
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
