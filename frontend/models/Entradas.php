<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "entradas".
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $url
 * @property string|null $photo_url
 * @property string|null $fecha_publicacion
 * @property string|null $date
 */
class Entradas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entradas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_publicacion', 'date'], 'safe'],
            [['titulo', 'url', 'photo_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'url' => 'Url',
            'photo_url' => 'Photo Url',
            'fecha_publicacion' => 'Fecha Publicacion',
            'date' => 'Date',
        ];
    }
}
