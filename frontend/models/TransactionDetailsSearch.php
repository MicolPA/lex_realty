<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TransactionDetails;

/**
 * TransactionDetailsSearch represents the model behind the search form of `frontend\models\TransactionDetails`.
 */
class TransactionDetailsSearch extends TransactionDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'amount', 'procesado'], 'integer'],
            [['state', 'payer_first_name', 'payer_last_name', 'payer_id', 'payer_email', 'country_code', 'invoice_number', 'token', 'date'], 'safe'],
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
        $query = TransactionDetails::find();

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
            'amount' => $this->amount,
            'procesado' => $this->procesado,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'payer_first_name', $this->payer_first_name])
            ->andFilterWhere(['like', 'payer_last_name', $this->payer_last_name])
            ->andFilterWhere(['like', 'payer_id', $this->payer_id])
            ->andFilterWhere(['like', 'payer_email', $this->payer_email])
            ->andFilterWhere(['like', 'country_code', $this->country_code])
            ->andFilterWhere(['like', 'invoice_number', $this->invoice_number])
            ->andFilterWhere(['like', 'token', $this->token]);

        return $dataProvider;
    }
}
