<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "propiedades_tipo".
 *
 * @property int $id
 * @property string|null $nombre
 *
 * @property Propiedades[] $propiedades
 */
class PropiedadesTipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propiedades_tipo';
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
        return $this->hasMany(Propiedades::className(), ['tipo_propiedad' => 'id']);
    }
}
