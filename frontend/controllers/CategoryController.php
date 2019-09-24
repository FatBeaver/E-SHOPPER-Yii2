<?php

namespace frontend\controllers;

use Yii;
use common\controllers\AppController;
use frontend\models\Category;
use frontend\models\Product;
use yii\web\Controller;

class CategoryController extends AppController
{
    public function actionIndex()
    {   
        $hits_product = Product::find()->where(['hit' => 1])->limit(6)->all(); 
     
        return $this->render('index', [
            'hits_product' => $hits_product,
        ]);
    }
}