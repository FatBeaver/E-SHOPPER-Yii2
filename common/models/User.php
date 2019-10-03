<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{   

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    public static function findByEmail($email) 
    {
        return static::findOne(['email' => $email]);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public static function findIdentity($id)
    {   
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {}
  

    public function getId()
    {
        return $this->id;
    }

    public function generateAuthKey() 
    {
       $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($auth_key)
    {   
        return $this->auth_key === $auth_key;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
