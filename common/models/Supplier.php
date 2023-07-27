<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $id
 * @property string $supplier_name
 * @property string $address
 * @property string $phone
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Purchase[] $purchases
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
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
            [['supplier_name', 'address', 'phone'], 'required'],
            [['address'], 'string'],
            [['supplier_name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'supplier_name' => 'Pemasok',
            'address' => 'Alamat',
            'phone' => 'No HP',
        ];
    }

    /**
     * Gets query for [[Purchases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchase::className(), ['supplier_id' => 'id']);
    }
}
