<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Propiedades;

/**
 * PropiedadesSearch represents the model behind the search form of `frontend\models\Propiedades`.
 */
class PropiedadesSearch extends Propiedades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tipo_propiedad', 'ubicacion_id', 'habitaciones', 'baños', 'riezgo_id', 'impuestos', 'cargas_gramabes', 'deslinde', 'certificado_titulo', 'user_id'], 'integer'],
            [['titulo_publicacion', 'detalles', 'fecha_publicacion', 'foto_1', 'foto_2', 'foto_3', 'foto_4'], 'safe'],
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
        $query = Propiedades::find()->where(['<>', 'id', 1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
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
            'tipo_propiedad' => $this->tipo_propiedad,
            'ubicacion_id' => $this->ubicacion_id,
            'habitaciones' => $this->habitaciones,
            'baños' => $this->baños,
            'riezgo_id' => $this->riezgo_id,
            'impuestos' => $this->impuestos,
            'cargas_gramabes' => $this->cargas_gramabes,
            'deslinde' => $this->deslinde,
            'certificado_titulo' => $this->certificado_titulo,
            'user_id' => $this->user_id,
            'fecha_publicacion' => $this->fecha_publicacion,
        ]);

        $query->andFilterWhere(['like', 'titulo_publicacion', $this->titulo_publicacion])
            ->andFilterWhere(['like', 'detalles', $this->detalles])
            ->andFilterWhere(['like', 'foto_1', $this->foto_1])
            ->andFilterWhere(['like', 'foto_2', $this->foto_2])
            ->andFilterWhere(['like', 'foto_3', $this->foto_3])
            ->andFilterWhere(['like', 'foto_4', $this->foto_4]);

        return $dataProvider;
    }
}
