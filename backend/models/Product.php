<?php

namespace backend\models;

use Yii;
use backend\models\Category;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property int $hit
 * @property int $new
 * @property int $sale
 * @property int $availability
 * @property string $recommended
 */
class Product extends \yii\db\ActiveRecord
{   

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

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
            [['category_id', 'name', 'price', 'hit', 'new', 'sale'], 'required'],
            [['category_id', 'hit', 'new', 'sale', 'availability'], 'integer'],
            [['content'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
            [['recommended'], 'string', 'max' => 2],
            //[['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
            //[['gallery'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ товара',
            'category_id' => 'Категория',
            'name' => 'Название',
            'content' => 'Описание',
            'price' => 'Цена',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'image' => 'Изображение',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Скидка',
            'availability' => 'Наличие',
            'recommended' => 'Рекомендованно',
        ];
    }

    public static function getCategories() {
        $models = Category::find()->all();
        $categories = [];
        foreach($models as $category) {
            $categories[$category->id] = $category->id . ')' . $category->name;

        }
        return $categories;
    }

    public function getCategoryName()
    {   
        $category = $this->category;
        return $category ? $category->name : 'Самостоятельная категория';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
