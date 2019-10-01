<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\swiftmailer\Mailer;
?>
<div class="table-responsive cart_info" style="width:width:900px !imporatnt">
    <table class="table table-condensed" >
        <thead>
            <tr class="cart_menu">
                <td class="number">Number</td>
                <td class="description">Product Name</td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($_SESSION['cart'])) $i = 1; foreach($_SESSION['cart'] as $id => $product): ?>
            <tr>
                <td><h2><?=$i?>)</h2></td>
                <td class="cart_description">
                    <h4><a href=""><?= $product['name'] ?></a></h4>
                    <p>Web ID: <?= $id ?></p>
                </td>
                <td class="cart_price">
                    <p>$<?= $product['price'] ?></p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        <p><?= $product['qty']?></p>
                    </div>
                </td>
                <td class="cart_delete">
                    <a class="cart_quantity_delete" data-id="<?=$id?>" href="#"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            <hr/>
            <?php $i++; endforeach; ?>
            <tr><td><h3>Количество товаров: </h3></td>
                <td></td>
                <td></td>
                <td></td>
                <td><h2><?= $_SESSION['cart.qty'] ?>шт.</h2></td>
            </tr>

            <tr>
                <td><h3>На сумму: </h3></td>
                <td></td>
                <td></td>
                <td></td>
                <td><h2><?= $_SESSION['cart.sum'] ?>$</h2></td>
            </tr>
        </tbody>
    </table>
</div>