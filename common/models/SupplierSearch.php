<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use common\models\Supplier;

/**
 * SupplierSearch represents the model behind the search form of `common\models\Supplier`.
 */
class SupplierSearch extends Supplier
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['supplier_name', 'address', 'phone'], 'safe'],
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
        $query = Supplier::find();

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
        ]);

        $query->andFilterWhere(['like', 'supplier_name', $this->supplier_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }

    public function getSupplierList(){
    	$query = ArrayHelper::map(Supplier::find()->orderBy(['supplier_name' => SORT_ASC])->all(), 'id', function($model){
    			return $model->supplier_name;
    	});
    	return $query;
    }
}
