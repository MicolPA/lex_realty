<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "stars_rating_count".
 *
 * @property int $id
 * @property int|null $desarrollador_id
 * @property float|null $fecha_entrega
 * @property float|null $calidad_materiales
 * @property float|null $entrega_areas_sociales
 * @property float|null $entrega_design
 * @property float|null $stars_count
 * @property string|null $email
 * @property string|null $date
 */
class StarsRatingCount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stars_rating_count';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desarrollador_id'], 'integer'],
            [['fecha_entrega', 'calidad_materiales', 'entrega_areas_sociales', 'entrega_design', 'stars_count'], 'number'],
            [['date'], 'safe'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'desarrollador_id' => 'Desarrollador ID',
            'fecha_entrega' => 'Fecha Entrega',
            'calidad_materiales' => 'Calidad Materiales',
            'entrega_areas_sociales' => 'Entrega Areas Sociales',
            'entrega_design' => 'Entrega Design',
            'stars_count' => 'Stars Count',
            'email' => 'Email',
            'date' => 'Date',
        ];
    }
}
