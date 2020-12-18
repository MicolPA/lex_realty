<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ubicaciones".
 *
 * @property int $id
 * @property string|null $nombre
 *
 * @property Propiedades[] $propiedades
 */
class Ubicaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ubicaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * Gets query for [[Propiedades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPropiedades()
    {
        return $this->hasMany(Propiedades::className(), ['ubicacion_id' => 'id']);
    }
}
