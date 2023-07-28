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

    public function getMonthlyReport(){
    	$db = \Yii::$app->db;
        $monthNow = date("Ym");
        $format = '%Y%m';
        $earlyDate = '1970-01-01';
    	$query = $db->createCommand(
            "
            SELECT a.product_name, b.total_purchase,
            b.amount_purchase, b.total_sale, b.amount_sale, b.total_purchase - b.total_sale as stock,
            b.amount_sale - b.amount_purchase as profit
            FROM `product` a
            LEFT JOIN (
                SELECT 
                x.product_id, 
                sum(x.amount) as total_purchase, 
                sum(x.purchase_price) as amount_purchase,
                sum(y.amount) as total_sale,
                sum(y.sale_price) as amount_sale
                FROM `purchase` x
                INNER JOIN `sale` y
                ON x.product_id = y.product_id
                WHERE DATE_FORMAT(DATE_ADD(:earlyDate, INTERVAL x.created_at SECOND), :format) = :monthNow
                AND DATE_FORMAT(DATE_ADD(:earlyDate, INTERVAL y.created_at SECOND), :format) = :monthNow
                GROUP BY x.product_id
            ) b
            ON a.id = b.product_id
            "
            )
            ->bindValue(':monthNow', $monthNow)
            ->bindValue(':format', $format)
            ->bindValue(':earlyDate', $earlyDate)
            ->queryAll();
        
        // var_dump($query); die;
        // var_dump($query->getRawSql()); die;

    	return $query;
    }

    public function getYtdReport(){
    	$db = \Yii::$app->db;
        $dateNow = date("Y-m-d");
        $format = '%Y-01-01';
        $earlyDate = '1970-01-01';
    	$query = $db->createCommand(
            "
            SELECT a.product_name, b.total_purchase,
            b.amount_purchase, b.total_sale, b.amount_sale, b.total_purchase - b.total_sale as stock,
            b.amount_sale - b.amount_purchase as profit
            FROM `product` a
            LEFT JOIN (
                SELECT 
                x.product_id, 
                sum(x.amount) as total_purchase, 
                sum(x.purchase_price) as amount_purchase,
                sum(y.amount) as total_sale,
                sum(y.sale_price) as amount_sale
                FROM `purchase` x
                INNER JOIN `sale` y
                ON x.product_id = y.product_id
                WHERE 
                (CAST(DATE_ADD(:earlyDate, INTERVAL x.created_at SECOND) as DATE) BETWEEN DATE_FORMAT(:dateNow, :format) AND :dateNow)
                AND (CAST(DATE_ADD(:earlyDate, INTERVAL y.created_at SECOND) as DATE) BETWEEN DATE_FORMAT(:dateNow, :format) AND :dateNow)
                GROUP BY x.product_id
            ) b
            ON a.id = b.product_id
            "
            )
            ->bindValue(':dateNow', $dateNow)
            ->bindValue(':format', $format)
            ->bindValue(':earlyDate', $earlyDate)
            ->queryAll();
        
    	return $query;
    }

    public function getYoyReport(){
    	$db = \Yii::$app->db;
        $dateNow = date("Y-m-d");
        $earlyDate = '1970-01-01';
    	$query = $db->createCommand(
            "
            SELECT a.product_name, b.total_purchase,
            b.amount_purchase, b.total_sale, b.amount_sale, b.total_purchase - b.total_sale as stock,
            b.amount_sale - b.amount_purchase as profit
            FROM `product` a
            LEFT JOIN (
                SELECT 
                x.product_id, 
                sum(x.amount) as total_purchase, 
                sum(x.purchase_price) as amount_purchase,
                sum(y.amount) as total_sale,
                sum(y.sale_price) as amount_sale
                FROM `purchase` x
                INNER JOIN `sale` y
                ON x.product_id = y.product_id
                WHERE 
                (CAST(DATE_ADD(:earlyDate, INTERVAL x.created_at SECOND) as DATE) BETWEEN DATE_SUB(:dateNow, INTERVAL 1 YEAR) AND :dateNow)
                AND (CAST(DATE_ADD(:earlyDate, INTERVAL y.created_at SECOND) as DATE) BETWEEN DATE_SUB(:dateNow, INTERVAL 1 YEAR) AND :dateNow)
                GROUP BY x.product_id
            ) b
            ON a.id = b.product_id
            "
            )
            ->bindValue(':dateNow', $dateNow)
            ->bindValue(':earlyDate', $earlyDate)
            ->queryAll();
        
    	return $query;
    }
}
