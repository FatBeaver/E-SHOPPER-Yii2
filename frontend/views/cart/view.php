<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="container">
 <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dissmiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif;?>   
    
    <?php if(Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissable" role="alert">
        <button type="button" class="close" data-dissmiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif;?> 
</div>
<?php if (!empty($_SESSION['cart'])): ?>
<section id="cart_items">
    <div class="container">
   
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="summ">Summ</td>
                        <td class="delete">Delete</td>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($_SESSION['cart'])) foreach($session as $id => $product): ?>
                <tr>
                    <td class="cart_product">
                        <a href="">
                            <?= Html::img('@web/images/products/' . $product['img'], [
                                'alt' => $product['name'],
                                'style' => 'width:120px',
                            ]);?>
                        </a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="<?= Url::to(['product/view', 'id' => $id]) ?>"><?= $product['name'] ?></a></h4>
                        <p>Web ID: <?= $id ?></p>
                    </td>
                    <td class="cart_price">
                        <p>$<?= $product['price'] ?></p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="#" data-id="<?=$id?>"> + </a>
                            <input class="cart_quantity_input" data-id="<?=$id?>" type="text" name="quantity" value="<?= $product['qty']?>" 
                            autocomplete="off" size="2">
                            <a class="cart_quantity_down" href="#" data-id="<?=$id?>"> - </a>
                        </div>
                    </td>
                    <td class="cart_price">
                        <p>$<?= $product['price'] * $product['qty']?></p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" data-id="<?=$id?>" href="#"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                    <tr><td><h3>Количество товаров: </h3></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><h2><?= $count ?>шт.</h2></td>
                </tr>
                <tr>
                    <td><h3>На сумму: </h3></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><h2><?= $_SESSION['cart.sum'] ?>$</h2></td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <h2>Заполните все поля для оформления заказа</h2>
        <hr/>
        
        <?php $form = ActiveForm::begin() ?>
        
        <?= $form->field($order, 'name') ?>
        <?= $form->field($order, 'email') ?>
        <?= $form->field($order, 'phone') ?>
        <?= $form->field($order, 'address') ?>
        <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end() ?>

    </div>
</section> <!--/#cart_items-->
<?php else: ?>   
<p style="margin:40px 0px 70px 10% !important;
    font-size: 40px;
    font-weight: bold;">
Корзина пуста...
</p>
<?php endif; ?> 