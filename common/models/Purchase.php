<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "purchase".
 *
 * @property int $id
 * @property int $amount
 * @property float $purchase_price
 * @property int $product_id
 * @property int $supplier_id
 * @property int $user_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Supplier $supplier
 * @property User $user
 */
class Purchase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase';
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
            [['amount', 'purchase_price', 'product_id', 'supplier_id', 'user_id'], 'required'],
            [['amount', 'product_id', 'supplier_id', 'user_id'], 'integer'],
            [['purchase_price'], 'number'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Jumlah',
            'purchase_price' => 'Harga Beli per Unit',
            'product_id' => 'Barang',
            'supplier_id' => 'Pemasok',
            'user_id' => 'Pengguna',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }


    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
