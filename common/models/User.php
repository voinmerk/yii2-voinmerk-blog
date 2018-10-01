<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Blog[] $frontendBlogsCreatedBy
 * @property Blog[] $frontendBlogsUpdatedBy
 * @property Category[] $frontendCategoriesCreatedBy
 * @property Category[] $frontendCategoriesUpdatedBy
 * @property Portfolio[] $frontendPortfolioCreatedBy
 * @property Portfolio[] $frontendPortfolioUpdatedBy
 * @property Resume[] $frontendResumeCreatedBy
 * @property Resume[] $frontendResumeUpdatedBy
 * 
 * @property Blog[] $backendBlogsCreatedBy
 * @property Blog[] $backendBlogsUpdatedBy
 * @property Category[] $backendCategoriesCreatedBy
 * @property Category[] $backendCategoriesUpdatedBy
 * @property Portfolio[] $backendPortfoliosCreatedBy
 * @property Portfolio[] $backendPortfoliosUpdatedBy
 * @property Resume[] $backendResumesCreatedBy
 * @property Resume[] $backendResumesUpdatedBy
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_SIGNUP = 0;    // Зарегистрирвоан, но не активирован
    const STATUS_ACTIVE = 10;   // Активирован
    const STATUS_BANNED = 20;   // Заблокирован (возможно восстановить)
    const STATUS_DELETE = 30;   // Удалён (не возможно восстановить)

    const TYPE_FREELANCE = 0;
    const TYPE_CUSTOMER = 1;

    /**
     * Сценарии
     * 
     * - Авторизация
     * - Регистрация
     * - Восстановление пароля
     * - Смена пароля
     * - Персональная информация (имя, фамилия, почта, биография и тд)
     */
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_SIGNUP = 'signup';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return [
            self::SCENARIO_LOGIN => ['username', 'password'],
            self::SCENARIO_SIGNUP => ['username', 'email', 'first_name', 'last_name', 'type', 'password'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'first_name', 'last_name'], 'string', 'max' => 255],
            [
                'avatar', 'image', 'extensions' => ['png','jpg', 'gif'],
                'maxSize' => 1024*1024,
                'minWidth' => 100, 'maxWidth' => 1000,
                'minHeight' => 100, 'maxHeight' => 1000,
                'skipOnEmpty' => true,
            ],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_SIGNUP],
            ['status', 'in', 'range' => [self::STATUS_SIGNUP, self::STATUS_ACTIVE, self::STATUS_BANNED, self::STATUS_DELETE]],
            ['type', 'default', 'value' => self::TYPE_FREELANCE],
            ['type', 'in', 'range' => [self::TYPE_FREELANCE, self::TYPE_CUSTOMER]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'username' => Yii::t('common', 'Username'),
            'auth_key' => Yii::t('common', 'Auth Key'),
            'password_hash' => Yii::t('common', 'Password Hash'),
            'password_reset_token' => Yii::t('common', 'Password Reset Token'),
            'email' => Yii::t('common', 'Email'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * {@inheritdoc}
     */
    public static function getTypeList()
    {
        return [
            'Фрилансер', 'Заказчик'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getTypeName($id)
    {
        $types = self::getTypeList();

        return $types[self::$type];
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrontendBlogsCreatedBy()
    {
        return $this->hasMany(\frontend\models\Blog::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrontendBlogsUpdatedBy()
    {
        return $this->hasMany(\frontend\models\Blog::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrontendCategoriesCreatedBy()
    {
        return $this->hasMany(\frontend\models\Category::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrontendCategoriesUpdatedBy()
    {
        return $this->hasMany(\frontend\models\Category::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrontendPortfolioCreatedBy()
    {
        return $this->hasMany(\frontend\models\Portfolio::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrontendPortfolioUpdatedBy()
    {
        return $this->hasMany(\frontend\models\Portfolio::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrontendResumeCreatedBy()
    {
        return $this->hasMany(\frontend\models\Resume::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrontendResumeUpdatedBy()
    {
        return $this->hasMany(\frontend\models\Resume::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBackendBlogsCreatedBy()
    {
        return $this->hasMany(\backend\models\Blog::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBackendBlogsUpdatedBy()
    {
        return $this->hasMany(\backend\models\Blog::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBackendCategoriesCreatedBy()
    {
        return $this->hasMany(\backend\models\Category::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBackendCategoriesUpdatedBy()
    {
        return $this->hasMany(\backend\models\Category::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBackendPortfoliosCreatedBy()
    {
        return $this->hasMany(\backend\models\Portfolio::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBackendPortfoliosUpdatedBy()
    {
        return $this->hasMany(\backend\models\Portfolio::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBackendResumesCreatedBy()
    {
        return $this->hasMany(\backend\models\Resume::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBackendResumesUpdatedBy()
    {
        return $this->hasMany(\backend\models\Resume::className(), ['updated_by' => 'id']);
    }
}
