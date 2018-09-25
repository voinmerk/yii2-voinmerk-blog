<?php

namespace backend\models;

use Yii;

use common\models\User;

/**
 * This is the model class for table "{{%resume}}".
 *
 * @property int $id
 * @property string $full_name
 * @property string $phone
 * @property string $email
 * @property string $position
 * @property string $category
 * @property string $city
 * @property string $biography
 * @property string $slug
 * @property string $image
 * @property string $birth_date
 * @property int $salary
 * @property int $gender
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property ResumeEducation[] $resumeEducations
 * @property ResumeExperience[] $resumeExperiences
 * @property ResumeSkill[] $resumeSkills
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%resume}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'phone', 'email', 'position', 'category', 'city', 'biography', 'slug', 'image', 'birth_date', 'salary', 'gender', 'created_at', 'updated_at'], 'required'],
            [['biography'], 'string'],
            [['birth_date'], 'safe'],
            [['salary', 'gender', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['full_name', 'phone', 'email', 'position', 'category', 'city', 'slug', 'image'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaveriors()
    {
        return [
            'slug' => [
                'class' => \yii\behaveriors\SluggableBehavior::className(),
                'ensureUnique' => true,
            ],
            'blame' => [
                'class' => \yii\behaveriors\BlameableBehavior::className(),
            ],
            'timestamp' => [
                'class' => \yii\behaveriors\TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'full_name' => Yii::t('backend', 'Full Name'),
            'phone' => Yii::t('backend', 'Phone'),
            'email' => Yii::t('backend', 'Email'),
            'position' => Yii::t('backend', 'Position'),
            'category' => Yii::t('backend', 'Category'),
            'city' => Yii::t('backend', 'City'),
            'biography' => Yii::t('backend', 'Biography'),
            'slug' => Yii::t('backend', 'Slug'),
            'image' => Yii::t('backend', 'Image'),
            'birth_date' => Yii::t('backend', 'Birth Date'),
            'salary' => Yii::t('backend', 'Salary'),
            'gender' => Yii::t('backend', 'Gender'),
            'status' => Yii::t('backend', 'Status'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_by' => Yii::t('backend', 'Updated By'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
        ];
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
    public function getResumeEducations()
    {
        return $this->hasMany(ResumeEducation::className(), ['resume_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumeExperiences()
    {
        return $this->hasMany(ResumeExperience::className(), ['resume_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumeSkills()
    {
        return $this->hasMany(ResumeSkill::className(), ['resume_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumePortfolios()
    {
        return $this->hasMany(Portfolio::className(), ['id' => 'portfolio_id'])->viaTable('resume_portfolio', ['resume_id' => 'id']);
    }
}
