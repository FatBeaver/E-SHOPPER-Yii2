<?php

use common\components\MenuWidget;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <img src="/images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <img src="/images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <img src="/images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">

                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->

                        <?= MenuWidget::widget(['template' => 'menu']); ?>

                    </div>

                    <div class="brands_products">
                        <!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--/brands_products-->

                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->
                </div>
            </div>

            <div class="col-sm-9 padding-right">

                <?php if(!empty($hits_product)): ?>
                <!--features_items-->
                <div class="features_items">
                    <h2 class="title text-center">Features Items</h2>

                    <?php foreach($hits_product as $hit): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <?= Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name, 
                                        'height' => '230vh', 'max-width' => '300px']) ?>
                                        <h2>$<?= $hit->price ?></h2>
                                        <p><a href="<?= Url::to(['product/view', 'id' => $hit->id]) ?>" 
                                            style="color:#555">
                                            <?= $hit->name ?>
                                            </a>
                                        </p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>$<?= $hit->price ?></h2>
                                                <p><a href="<?= Url::to(['product/view', 'id' => $hit->id]) ?>" 
                                                style="color:#555">
                                                <?= $hit->name ?>
                                                </a>
                                            </p>
                                            <a href="<?= Url::to(['cart/add', 'id' => $hit->id])?>" 
                                            class="btn btn-default add-to-cart" data-id="<?= $hit->id ?>">
                                            <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                    <?php if ($hit->new === 1 && $hit->sale === 0): ?>
                                        <?= Html::img("@web/images/home/new.png", ['alt' => 'new', 'class' => 'new']) ?>
                                    <?php endif; ?>
                                    <?php if ($hit->sale === 1 && $hit->new === 0): ?>
                                        <?= Html::img("@web/images/home/sale.png", ['alt' => 'sale', 'class' => 'new']) ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>

                </div>
                <!--features_items-->
                <?php endif; ?>

            <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>
            
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <?php
                $count = count($recommendedProducts);
                $i = 0; 
                foreach($recommendedProducts as $product): ?>
                <?php if($i % 3 == 0): ?>
                    <div class="item <?php if($i == 0) echo " active"?>">
                <?php endif; ?>	

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <?= Html::img("@web/images/products/{$product->img}", [
                                    'alt' => $product->name,
                                    'style' => 'height:30vh'
                                ]) ?>
                                <h2>$<?= $product->price ?></h2>
                                <p><?= $product->name ?></p>
                                <a href="#" data-id="<?=$product->id?>"
                                class="btn btn-fefault add-to-cart"><i class="fa fa-shopping-cart">
                                </i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $i++; if($i % 3 == 0 || $i == $count): ?>
                    </div>
                <?php endif; ?>	
                <?php endforeach; ?>  
                </div>

                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                    </a>	

            </div>
        </div><!--/recommended_items-->



            </div>
        </div>
    </div>
</section>