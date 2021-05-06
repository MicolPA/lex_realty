<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "constantes".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $contenido
 */
class Constantes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'constantes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contenido'], 'string'],
            [['nombre'], 'string', 'max' => 255],
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
            'contenido' => 'Contenido',
        ];
    }
}
