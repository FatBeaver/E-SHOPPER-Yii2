<?php 

namespace frontend\controllers;

use Yii;
use common\controllers\AppController;
use frontend\models\Category;
use frontend\models\Product;
use frontend\models\Review;
use yii\web\HttpException;
use common\models\User;

class ProductController extends AppController 
{
    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        $product = Product::find()->with('category')->where(['id' => $id])->one();
        if(empty($product))
            throw new HttpException(404, "Такого товара нет");

        $categoryProducts = Product::find()->where(['category_id' => $product->category->id])->limit(4)->all();
        $recommendedProducts = Product::find()->where(['hit' => 1])->limit(9)->orderBy('id DESC')->all();
        $reviews = Review::find()->with('user')->where(['product_id' => $id])
        ->orderBy(['id' => SORT_DESC])->all();
        $countReviews = count($reviews);

        $this->setMeta("E-SHOPPER | " . $product->name, $product->keywords, $product->description);

        return $this->render('view', [
            'product' => $product,
            'categoryProducts' => $categoryProducts,
            'recommendedProducts' => $recommendedProducts,  
            'reviews' => $reviews,
            'countReviews' => $countReviews,
        ]);
    }


    public function actionWriteReview()
    {
        $user_id = Yii::$app->user->getId();
        $text = Yii::$app->request->post('text');
        $id = Yii::$app->request->post('id');

        $text = \htmlspecialchars(trim($text));

        $review = new Review();
        $review->user_id = $user_id;
        $review->text = $text;
        $review->product_id = $id;

        if (!$review->save()) return false;

        $reviews = Review::find()->with('user')->where(['product_id' => $id])->orderBy(['id' => SORT_DESC])->all();

        return $this->renderPartial('ajax_review', [
            'reviews' => $reviews,
        ]);
    }
}