<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form of `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['product_name', 'description', 'unit'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }

    public function getProductList(){
    	$query = ArrayHelper::map(Product::find()->orderBy(['product_name' => SORT_ASC])->all(), 'id', function($model){
            return $model->product_name;
    	});
    	return $query;
    }
}
