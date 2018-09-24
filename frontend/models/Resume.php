<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

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
 * @property string $birth_date
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
class Resume extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
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
            [['full_name', 'phone', 'email', 'position', 'category', 'city', 'biography', 'slug', 'birth_date', 'gender', 'created_at', 'updated_at'], 'required'],
            [['biography'], 'string'],
            [['birth_date'], 'safe'],
            [['gender', 'created_by', 'updated_by', 'created_at', 'updated_at', 'status'], 'integer'],
            [['full_name', 'phone', 'email', 'position', 'category', 'city', 'slug'], 'string', 'max' => 255],
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
            'full_name' => Yii::t('frontend', 'Full Name'),
            'phone' => Yii::t('frontend', 'Phone'),
            'email' => Yii::t('frontend', 'Email'),
            'position' => Yii::t('frontend', 'Position'),
            'category' => Yii::t('frontend', 'Category'),
            'city' => Yii::t('frontend', 'City'),
            'biography' => Yii::t('frontend', 'Biography'),
            'slug' => Yii::t('frontend', 'Slug'),
            'birth_date' => Yii::t('frontend', 'Birth Date'),
            'gender' => Yii::t('frontend', 'Gender'),
            'created_by' => Yii::t('frontend', 'Created By'),
            'updated_by' => Yii::t('frontend', 'Updated By'),
            'created_at' => Yii::t('frontend', 'Created At'),
            'updated_at' => Yii::t('frontend', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getResumeAll()
    {
        return self::find()
                    ->where([
                        'status' => self::STATUS_ACTIVE
                    ])
                    ->asArray()
                    ->all();
    }

    /**
     * {@inheritdoc}
     */
    public static function getResumeOne($id)
    {
        return self::find()
                    ->joinWith([
                        'resumeSkills', 
                        'resumeEducations', 
                        'resumeExperiences', 
                        'resumePortfolios'
                    ])
                    ->where([
                        'resume.slug' => $id, 
                        'resume.status' => self::STATUS_ACTIVE
                    ])
                    ->asArray()
                    ->one();
    }

    /**
     * {@inheritdoc}
     */
    public function genders()
    {
        return [
            'Male', 'Female',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getGender($id)
    {
        $genders = $this->genders();

        return $genders[$id];
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
    public function getResumePortfolios()
    {
        return $this->hasMany(Portfolio::className(), ['id' => 'portfolio_id'])->viaTable('resume_portfolio', ['resume_id' => 'id']);
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
}
