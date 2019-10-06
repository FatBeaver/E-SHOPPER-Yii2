<?php 

use common\components\MenuWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<section id="advertisement">
    <div class="container">
        <img src="/images/shop/advertisement.jpg" alt="advertisement" />
    </div>
</section>
	
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->

                        <?= MenuWidget::widget(['template' => 'menu']); ?>
                        
                    </div><!--/category-productsr-->
                
                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->>
                    
                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->
                    
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?= $category->name ?></h2>
                    <?php if (!empty($products)): ?>
                    <?php foreach($products as $product): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?= Html::img("@web/images/products/{$product->img}", ['alt' => $product->name, 
                                    'height' => '230vh']) ?>
                                    <h2>$<?= $product->price; ?></h2>
                                    <p><a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>" 
                                            style="color:#555"><?= mb_substr($product->name, 0, 25);?>
                                    <?php if(mb_strlen($product->name) > 24): ?> 
                                    ...
                                    <?php endif; ?></a>
                                    </p>
                                    <a href="#" style="margin:5px auto 15px auto;"  class="btn btn-default add-to-cart" 
                                        data-id="<?=$product->id?>">
                                        <i class="fa fa-shopping-cart">
                                        </i>Add to cart
                                    </a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$<?= $product->price; ?></h2>
                                        <p><a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>" 
                                            style="color:#555">
                                            <?= $product->name ?>
                                            </a>
                                        </p>
                                        <a href="<?= Url::to(['cart/add', 'id' => $product->id])?>" 
                                        class="btn btn-fefault add-to-cart cart" style="margin:5px auto 15px auto;" 
                                data-id="<?=$product->id?>"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                                <?php if ($product->new === 1 && $product->sale === 0): ?>
                                    <?= Html::img("@web/images/home/new.png", ['alt' => 'new', 'class' => 'new']) ?>
                                <?php endif; ?>
                                <?php if ($product->sale === 1 && $product->new === 0): ?>
                                    <?= Html::img("@web/images/home/sale.png", ['alt' => 'sale', 'class' => 'new']) ?>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>    
                    <?= 
                        LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                    ?>
                    <?php else: ?>
                        <h2>Здесь товаров пока нет...</h2>
                    <?php endif; ?>
                   <!-- <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul> -->
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>