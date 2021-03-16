<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tasas_hipotecarias".
 *
 * @property int $id
 * @property string|null $nombre_banco
 * @property string|null $photo_url
 * @property float|null $tasa
 * @property string|null $duracion
 * @property string|null $correo
 * @property string|null $telefono
 * @property string|null $date
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
            [['tasa'], 'number'],
            [['date', 'photo_url', 'telefono'], 'safe'],
            [['nombre_banco', 'duracion', 'correo'], 'string', 'max' => 255],
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
            'duracion' => 'Duracion',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'date' => 'Date',
        ];
    }
}
