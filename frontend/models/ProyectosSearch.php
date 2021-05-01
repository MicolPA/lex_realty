<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Proyectos;

/**
 * ProyectosSearch represents the model behind the search form of `frontend\models\Proyectos`.
 */
class ProyectosSearch extends Proyectos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ubicacion_id', 'desarrollador_id'], 'integer'],
            [['nombre', 'descripcion', 'foto_1', 'foto_2', 'foto_3', 'foto_4', 'foto_5', 'foto_6', 'foto_7', 'foto_8', 'date'], 'safe'],
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
    public function search($params, $desarrolladoras_id=null)
    {
        $query = Proyectos::find();

        if ($desarrolladoras_id) {
            $query->where(['desarrollador_id' => $desarrolladoras_id]);
        }

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
            'ubicacion_id' => $this->ubicacion_id,
            'desarrollador_id' => $this->desarrollador_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'foto_1', $this->foto_1])
            ->andFilterWhere(['like', 'foto_2', $this->foto_2])
            ->andFilterWhere(['like', 'foto_3', $this->foto_3])
            ->andFilterWhere(['like', 'foto_4', $this->foto_4])
            ->andFilterWhere(['like', 'foto_5', $this->foto_5])
            ->andFilterWhere(['like', 'foto_6', $this->foto_6])
            ->andFilterWhere(['like', 'foto_7', $this->foto_7])
            ->andFilterWhere(['like', 'foto_8', $this->foto_8]);

        return $dataProvider;
    }
}
