<?php

namespace frontend\controllers;

use Yii;
use common\controllers\AppController;
use frontend\models\Category;
use frontend\models\Product;

class CategoryController extends AppController
{
    public function actionIndex()
    {   
        $hits_product = Product::find()->where(['hit' => 1])->limit(6)->all(); 
        $this->setMeta("E-SHOPPER");
        return $this->render('index', [
            'hits_product' => $hits_product,
        ]);
    }

    public function actionView()
    {   
        $id = Yii::$app->request->get('id');
        $products = Product::find()->where(['category_id' => $id])->all();
        $category = Category::findOne($id);
        $this->setMeta("E-SHOPPER | " . $category->name, $category->keywords, $category->description);

        return $this->render('view', [
            'products' => $products,
            'category' => $category,
        ]);
    }
}