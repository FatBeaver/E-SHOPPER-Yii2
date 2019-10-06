<?php

namespace frontend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $text
 * @property string $date
 * @property int $user_id
 *
 * @property User $user
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 
            'targetAttribute' => ['user_id' => 'id']],
        ];
    }

  // public function __construct($user_id, $text)
  // {
   //    $this->user_id = $user_id;
  //     $this->text = $text;
  // }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
