<?php 

namespace frontend\controllers;

use Yii;
use common\controllers\AppController;
use frontend\models\Controller;
use frontend\models\Product;

class ProductController extends AppController 
{
    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        $product = Product::find()->with('category')->where(['id' => $id])->one();
        $categoryProducts = Product::find()->where(['category_id' => $product->category->id])->all();
        $recommendedProducts = Product::find()->where(['hit' => 1])->limit(9)->orderBy('id DESC')->all();
        
        $this->setMeta("E-SHOPPER | " . $product->name, $product->keywords, $product->description);

        return $this->render('view', [
            'product' => $product,
            'categoryProducts' => $categoryProducts,
            'recommendedProducts' => $recommendedProducts
        ]);
    }
}