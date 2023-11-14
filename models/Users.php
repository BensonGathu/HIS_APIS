<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Users extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $access_token;


    
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['f_name', 'l_name', 'email', 'password'], 'required'],
            [['f_name', 'l_name', 'email', 'password'], 'string', 'max' => 255],
            ['email', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'f_name' => 'F Name',
            'l_name' => 'L Name',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * Hash the password before saving a new record.
     *
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                // Hash the password only for new records
                $this->password = Yii::$app->security->generatePasswordHash($this->password);
            }
            return true;
        }
        return false;
    }

    /**
     * Validate user password.
     *
     * @param string $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }


    

   


}
