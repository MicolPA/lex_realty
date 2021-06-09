<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tasas_hipotecarias".
 *
 * @property int $id
 * @property string|null $nombre_banco
 * @property string|null $photo_url
 * @property string|null $tasa
 * @property string|null $duracion
 * @property string|null $correo
 * @property string|null $telefono
 * @property string|null $date
 * @property string|null $tasa_2
 * @property string|null $tasa_3
 * @property string|null $duracion_2
 * @property string|null $duracion_3
 * @property string|null $tipo
 * @property string|null $tipo_2
 * @property string|null $tipo_3
 */
class TasasHipotecarias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasas_hipotecarias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['nombre_banco', 'photo_url', 'tasa', 'duracion', 'correo', 'telefono', 'tasa_2', 'tasa_3', 'duracion_2', 'duracion_3', 'tipo', 'tipo_2', 'tipo_3'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_banco' => 'Nombre Banco',
            'photo_url' => 'Photo Url',
            'tasa' => 'Tasa',
            'duracion' => 'Duración',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'date' => 'Date',
            'tasa_2' => 'Tasa 2',
            'tasa_3' => 'Tasa 3',
            'duracion_2' => 'Duración 2',
            'duracion_3' => 'Duración 3',
            'tipo' => 'Tipo',
            'tipo_2' => 'Tipo 2',
            'tipo_3' => 'Tipo 3',
        ];
    }
}
