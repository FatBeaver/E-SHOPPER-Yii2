<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use frontend\models\Order;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string $name
 * @property double $price
 * @property string $qty_item
 * @property double $sum_item
 */
class OrderItem extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'price', 'qty_item', 'sum_item'], 'required'],
            [['order_id', 'product_id'], 'integer'],
            [['price', 'sum_item'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['qty_item'], 'string', 'max' => 10],
        ];
    }

    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
