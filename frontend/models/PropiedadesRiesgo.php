<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "propiedades_riesgo".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $color
 */
class PropiedadesRiesgo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propiedades_riesgo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'color'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'color' => 'Color',
        ];
    }
}
