<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = 'Заказ номер: №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

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
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' => function($model)
                {
                    return !$model->status ? '<span class="text-danger">
                    Не обработан</span>' : '<span class="text-success">Обработан</span>';
                },
                'format' => 'html',
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>
    <hr/>
    <h2>Товары в заказе </h2>
    <?php $items = $model->orderItem;?>

    <?php foreach($items as $item): ?>

    <h3>Имя товара: <?= $item->name ?></h3>
    <p>Цена: <?= $item->price ?>$</p>
    <p>Количество: <?= $item->qty_item ?></p>
    <p>На сумму: <?= $item->sum_item ?></p>
    <hr>   
    <?php endforeach; ?>
</div>
