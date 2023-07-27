<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $product_name
 * @property string $description
 * @property string $unit
 * @property int $user_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
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
            [['product_name', 'description', 'unit', 'user_id'], 'required'],
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [['product_name', 'unit'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Nama Barang',
            'description' => 'Keterangan',
            'unit' => 'Satuan',
            'user_id' => 'Pengguna',
        ];
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
