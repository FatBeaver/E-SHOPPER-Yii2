<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $keywords
 * @property string $description
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    public static function getCategories($id) {
        $models = Category::find()->where(['parent_id' => 0])->all();
        $categories = [];
        $i = 0;
        foreach($models as $category){
            if ($i === 0) {
                $categories[$i] = 'Самостоятельная категория';
            }
            if($category->id === $id) continue;
            $categories[$category->id ] = ' - ' . $category->name;
            $i++;
        }
        return $categories;
    }
   
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    public function getCategoryName()
    {
        $category = $this->category;
        return $category ? $category->name : 'Самостоятельная категория';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ Категории',
            'parent_id' => 'Родительская категория',
            'name' => 'Имя',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета описание',
        ];
    }
}
