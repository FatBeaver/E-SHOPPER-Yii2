<?php

namespace frontend\controllers;

use Yii;
use common\controllers\AppController;
use frontend\models\Category;
use frontend\models\Product;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionIndex()
    {   
        $recommendedProducts = Product::find()->where(['hit' => 1])->limit(9)->orderBy('id DESC')->all();
        $hits_product = Product::find()->where(['hit' => 1])->limit(6)->all(); 
        $this->setMeta("E-SHOPPER");

        return $this->render('index', [
            'hits_product' => $hits_product,
            'recommendedProducts' => $recommendedProducts
        ]);
    }

    public function actionView()
    {   
        $id = Yii::$app->request->get('id');
        //$products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam'  => false,
            'pageSizeParam' => false
        ]);

        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $category = Category::findOne($id);
        if(empty($category))
            throw new HttpException(404, "Такой категории нет");
            
        $this->setMeta("E-SHOPPER | " . $category->name, $category->keywords, $category->description);

        return $this->render('view', [
            'products' => $products,
            'pages' => $pages,
            'category' => $category,
        ]);
    }

    public function actionSearch()
    {
        $userQuery = trim(Yii::$app->request->get('userQuery'));
        $searchResult = Product::find()->where(['like', 'name', $userQuery]);
        $this->setMeta("E-SHOPPER | " . $userQuery);

        if (!$userQuery)
            return  $this->render('search', [
                'userQuery' => $userQuery
            ]);
            
        $pages = new Pagination([
            'totalCount' => $searchResult->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $searchResult->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', [
            'products' => $products,
            'pages' => $pages,
            'userQuery' => $userQuery,
        ]);
    }
}