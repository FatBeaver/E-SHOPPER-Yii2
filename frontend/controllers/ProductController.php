<?php 

namespace frontend\controllers;

use Yii;
use common\controllers\AppController;
use frontend\models\Category;
use frontend\models\Product;
use yii\web\HttpException;

class ProductController extends AppController 
{
    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        $product = Product::find()->with('category')->where(['id' => $id])->one();
        if(empty($product))
            throw new HttpException(404, "Такого товара нет");

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