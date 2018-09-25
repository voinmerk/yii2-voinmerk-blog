<?php
namespace frontend\models;

use Yii;

use common\models\User;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
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
 */
class Category extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort_order', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['title', 'content', 'image', 'slug', 'created_at', 'updated_at'], 'required'],
            [['content', 'meta_keywords', 'meta_description'], 'string'],
            [['title', 'image', 'meta_title', 'slug'], 'string', 'max' => 255],
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
            'parent_id' => Yii::t('frontend', 'Parent ID'),
            'title' => Yii::t('frontend', 'Title'),
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
    public static function buildTree(array $elements, $parentId = 0) {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['items'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

    /**
     * {@inheritdoc}
     */
    public static function getCategoryTree()
    {
        $data = self::find()
                    ->select(['id', 'parent_id', 'title', 'slug', 'sort_order', 'meta_title'])
                    ->where(['status' => self::STATUS_ACTIVE])
                    ->indexBy('id')
                    ->orderBy(['sort_order' => SORT_ASC])
                    ->asArray()
                    ->all();
        
        $list = self::buildTree($data);

        return $list;
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
}
