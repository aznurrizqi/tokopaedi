<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $customer_name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Sale[] $sales
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_name', 'address', 'phone', 'email'], 'required'],
            [['address'], 'string'],
            [['customer_name', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_name' => 'Nama Pelanggan',
            'address' => 'Alamat',
            'phone' => 'No HP',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sale::className(), ['customer_id' => 'id']);
    }
}
