<?php

namespace frontend\controllers;

use Yii;
use common\controllers\AppController;
use frontend\models\Product;
use frontend\models\Cart;
use frontend\models\Order;
use frontend\models\OrderItem;

class CartController extends AppController
{   
    //public $layout = '';
    public function actionAdd()
    {   
        $id = Yii::$app->request->get('id');
        $qty = Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;

        $product = Product::findOne($id);
        if (empty($product)) return false;
        
        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($product, $qty);
        $qtyArray = array_column($_SESSION['cart'], 'qty');
        $count = array_sum($qtyArray);
        
        return $this->renderPartial('cart-modal', [
            'session' => $session['cart'],
            'count' => $count,
        ]);  
    }

    public function actionEditicon()
    {   
        $session = Yii::$app->session;
        $session->open();

        if (isset($_SESSION['cart'])) {
            $qtyArray = array_column($_SESSION['cart'], 'qty');
            $count = array_sum($qtyArray);
            echo "$count" + 1;
        } else {
            echo "1";
        }
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();

        $session->remove('cart');
        $session->remove('cart.sum');
        $session->remove('cart.qty');
        echo '<h3>Корзина пуста...</h3>';
    }

    public function actionDeleteItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->recalc($id);
        $qtyArray = array_column($_SESSION['cart'], 'qty');
        $count = array_sum($qtyArray);

        if (empty($qtyArray)) {
            return '<h3>Корзина пуста...</h3>';
        }

        return $this->renderPartial('cart-modal', [
            'session' => $session['cart'],
            'count' => $count
        ]);  
    }

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();

        if (empty($_SESSION['cart'])) {
            return '<h3>Корзина пуста...</h3>';
        }
        $qtyArray = array_column($_SESSION['cart'], 'qty');
        $count = array_sum($qtyArray);
        
        return $this->renderPartial('cart-modal', [
            'session' => $session['cart'],
            'count' => $count
        ]);  
    }

    public function actionView()
    {   
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Корзина');
        $order = new Order();
        if ($order->load(Yii::$app->request->post()))
        {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            if ($order->save()) {
                Yii::$app->session->setFlash('success', 'Ваш заказ оформлен!. <br/>
                    Менеджер вскоре свяжется с вами.');

                $this->saveOrderItems($session['cart'], $order->id);
                unset($_SESSION['cart']);

                return $this->render('view', [
                    'session' => $session['cart'],
                ]);

            } else {
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа :(');
            }
        }

        if (empty($_SESSION['cart'])) {
            return $this->render('view');
        }
        $qtyArray = array_column($_SESSION['cart'], 'qty');
        $count = array_sum($qtyArray);

    
        return $this->render('view', [
            'session' => $session['cart'],
            'order' => $order,
            'count' => $count
        ]);
    }

    protected function saveOrderItems($items, $order_id)
    {
        foreach($items as $id => $item)
        {
            $item_order = new OrderItem();
            $item_order->order_id = $order_id;
            $item_order->product_id = $id;
            $item_order->name = $item['name'];
            $item_order->price = $item['price'];
            $item_order->qty_item = $item['qty'];
            $item_order->sum_item = $item['qty'] * $item['price'];
            $item_order->save(false);
        }
    }
}