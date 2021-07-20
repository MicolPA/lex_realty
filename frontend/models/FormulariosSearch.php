<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Formularios;

/**
 * FormulariosSearch represents the model behind the search form of `frontend\models\Formularios`.
 */
class FormulariosSearch extends Formularios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pagado', 'procesado', 'email_notification'], 'integer'],
            [['nombre', 'identificacion', 'direccion', 'ocupacion', 'correo', 'identificacion_url', 'certificado_titulo_url', 'pago_total', 'transaction_id', 'pdf_url', 'date'], 'safe'],
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
        $query = Formularios::find();

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
            'pagado' => $this->pagado,
            'procesado' => $this->procesado,
            'email_notification' => $this->email_notification,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'identificacion', $this->identificacion])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'ocupacion', $this->ocupacion])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'identificacion_url', $this->identificacion_url])
            ->andFilterWhere(['like', 'certificado_titulo_url', $this->certificado_titulo_url])
            ->andFilterWhere(['like', 'pago_total', $this->pago_total])
            ->andFilterWhere(['like', 'transaction_id', $this->transaction_id])
            ->andFilterWhere(['like', 'pdf_url', $this->pdf_url]);

        return $dataProvider;
    }
}
