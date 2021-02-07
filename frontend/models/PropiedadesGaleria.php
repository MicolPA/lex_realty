<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "propiedades_galeria".
 *
 * @property int $id
 * @property string|null $foto_5
 * @property string|null $foto_6
 * @property string|null $foto_7
 * @property string|null $foto_8
 * @property string|null $foto_9
 * @property string|null $foto_10
 * @property string|null $foto_11
 * @property string|null $foto_12
 */
class PropiedadesGaleria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propiedades_galeria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['foto_5', 'foto_6', 'foto_7', 'foto_8', 'foto_9', 'foto_10', 'foto_11', 'foto_12'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'foto_5' => 'Foto 5',
            'foto_6' => 'Foto 6',
            'foto_7' => 'Foto 7',
            'foto_8' => 'Foto 8',
            'foto_9' => 'Foto 9',
            'foto_10' => 'Foto 10',
            'foto_11' => 'Foto 11',
            'foto_12' => 'Foto 12',
        ];
    }
}
