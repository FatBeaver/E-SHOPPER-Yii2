<?php

namespace backend\models;

use Yii;
use backend\models\OrderItem;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property double $sum
 * @property int $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'qty', 'sum', 'name', 'email', 'phone', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty', 'status'], 'integer'],
            [['sum'], 'number'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    public function getOrderItem()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер Заказа',
            'created_at' => 'Оформленно',
            'updated_at' => 'Измененно',
            'qty' => 'Количество тов.',
            'sum' => 'Общ.сумма',
            'status' => 'Статус',
            'name' => 'Заказчик',
            'email' => 'Email ',
            'phone' => 'Телефон',
            'address' => 'Адресс',
        ];
    }
}
