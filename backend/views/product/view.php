<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'category_id',
                'value' => function($model) {
                    return $model->category->name;
                },
            ],
            'name',
            'content:html',
            'price',
            'keywords',
            'description',
            [
                'attribute' => 'img',
                'format' => 'html',
                'value' => function($data) 
                {
                    return Html::img("/images/products/{$data->img}", [
                        'alt' => $data->name,
                        'style' => 'width:260px',
                    ]);
                }
            ],
            [
                'attribute' => 'hit',
                'value' => function($model) {
                    return $model->hit ? 'Хит' : 'Не хит';
                },
            ],
            [
                'attribute' => 'new',
                'value' => function($model) {
                    return $model->new ? 'Новинка' : 'Старый';
                },
            ],
            [
                'attribute' => 'Распродажа',
                'value' => function($model) {
                    return $model->sale ? 'Распродажа' : 'Нет';
                },
            ],
            [
                'attribute' => 'Наличие',
                'value' => function($model) {
                    return !$model->availability ? 'В наличии' : 'Нет на складе';
                },
            ],
            [
                'attribute' => 'recommermded',
                'value' => function($model) {
                    return $model->recommended ? 'Рекомендованный' : 'Нет';
                },
            ],
        ],
    ]) ?>

</div>
