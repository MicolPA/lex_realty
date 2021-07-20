<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "titulos".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $imagen_url
 * @property string|null $descripcion
 */
class Titulos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'titulos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['nombre', 'imagen_url'], 'string', 'max' => 255],
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
            'imagen_url' => 'Imagen Url',
            'descripcion' => 'Descripcion',
        ];
    }
}
