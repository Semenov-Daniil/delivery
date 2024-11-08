<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string $photo
 * @property float $price
 * @property int $count
 * @property int $like
 * @property int $dislike
 * @property float $weight
 * @property float $kilocalories
 * @property string $shelf_life
 * @property string $description
 * @property int $category_id
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    public const NO_PHOTO = 'noPhoto.jpg';

    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'shelf_life', 'description', 'category_id'], 'required'],
            [['price', 'weight', 'kilocalories'], 'number'],
            [['count', 'like', 'dislike', 'category_id'], 'integer'],
            [['description'], 'string'],
            [['title', 'photo', 'shelf_life'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'photo' => 'Фотография',
            'price' => 'Цена',
            'count' => 'Кол-во',
            'like' => 'Like',
            'dislike' => 'Dislike',
            'weight' => 'Масса',
            'kilocalories' => 'Килокалории',
            'shelf_life' => 'Срок годности',
            'description' => 'Описание',
            'category_id' => 'Категория',
            'imageFile' => 'Изображение',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function upload()
    {
        if ($this->validate()) {
            $filename = Yii::$app->user->id . '_' . time() . '_' . Yii::$app->security->generateRandomString() . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs('uploads/' . $filename);
            $this->photo = $filename;
            return true;
        } else {
            return false;
        }
    }
}
