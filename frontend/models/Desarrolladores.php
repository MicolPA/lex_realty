<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "desarrolladores".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $portada
 * @property string|null $logo
 * @property string|null $date
 */
class Desarrolladores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'desarrolladores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['nombre', 'portada', 'logo'], 'string', 'max' => 255],
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
            'portada' => 'Portada',
            'logo' => 'Logo',
            'date' => 'Date',
        ];
    }
}
