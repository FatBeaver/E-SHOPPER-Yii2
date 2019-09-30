<?php 

use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php if (isset($_SESSION['cart'])) :?>
<div class="table-responsive cart_info" style="width:width:900px !imporatnt">
    <table class="table table-condensed" >
        <thead>
            <tr class="cart_menu">
                <td class="image">Item</td>
                <td class="description">Product Name</td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="delete">Delete</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($_SESSION['cart'])) foreach($session as $id => $product): ?>
            <tr>
                <td class="cart_product"> 
                    
                    <?= html::img("@web/images/products/" . $product['img'], [
                        'alt' => $product['name'],
                        'style' => 'width:110px'
                    ]) ?>
                </td>
                <td class="cart_description">
                    <h4><a href=""><?= $product['name'] ?></a></h4>
                    <p>Web ID: <?= $id ?></p>
                </td>
                <td class="cart_price">
                    <p>$<?= $product['price'] ?></p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        <a class="cart_quantity_up" href="#" id="<?=$id?>"> + </a>
                        <input class="cart_quantity_input <?php echo 'cart-' . $id ?>" type="text" name="quantity" value="<?= $product['qty']?>" autocomplete="off" size="2">
                        <a class="cart_quantity_down" href="#" id="<?=$id?>"> - </a>
                    </div>
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
                <td><h2><?= $count ?>шт.</h2></td>
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
<?php else: ?>
<h3>Корзина пуста...</h3>                      
<?php endif; ?>