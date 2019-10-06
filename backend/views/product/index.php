<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'category_id',
                'value' => function($data) {
                    return $data->getCategoryName();
                },
            ],
            'name',
            //'content:ntext',
            'price',
            [
                'attribute' => 'img',
                'format' => 'html',
                'value' => function($data) 
                {
                    return Html::img("/images/products/{$data->img}", [
                        'alt' => $data->name,
                        'style' => 'width:60px',
                    ]);
                }
            ],
            [
                'attribute' => 'hit',
                'value' => function($data) 
                {
                    return $data->hit ? 'Хит' : 'Не хит :)';
                }
            ],
            //'new',
            [
                'attribute' => 'new',
                'value' => function($data) 
                {
                    return $data->new? 'Новинка' : 'Не новый';
                }
            ],
            //'sale',
            [
                'attribute' => 'availability',
                'value' => function($data) 
                {
                    return !$data->availability ? 'В наличии' : 'Нет на складе';
                }
            ],
            //'recommended',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
