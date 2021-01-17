<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "propiedades_extras".
 *
 * @property int $id
 * @property int|null $propiedad_id
 * @property int|null $aire_acondicionado
 * @property int|null $balcon
 * @property int|null $cocina
 * @property int|null $lavadora
 * @property int|null $nevera
 * @property int|null $piscina
 * @property int|null $vista_campo_golf
 * @property int|null $amueblado
 * @property int|null $centro_comercial
 * @property int|null $estufa
 * @property int|null $marmol
 * @property int|null $parqueo
 * @property int|null $seguridad_24_hrs
 * @property string|null $date
 *
 * @property Propiedades $propiedad
 */
class PropiedadesExtras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propiedades_extras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['propiedad_id', 'aire_acondicionado', 'balcon', 'cocina', 'lavadora', 'nevera', 'piscina', 'vista_campo_golf', 'amueblado', 'centro_comercial', 'estufa', 'marmol', 'parqueo', 'seguridad_24_hrs'], 'integer'],
            [['date'], 'safe'],
            [['propiedad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Propiedades::className(), 'targetAttribute' => ['propiedad_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'propiedad_id' => 'Propiedad ID',
            'aire_acondicionado' => 'AIRE ACONDICIONADO',
            'balcon' => 'BALCÓN',
            'cocina' => 'COCINA',
            'lavadora' => 'LAVADORA/SECADORA',
            'nevera' => 'NEVERA',
            'piscina' => 'PISCINA',
            'vista_campo_golf' => 'VISTA AL CAMPO DE GOLF',
            'amueblado' => 'AMUEBLADO',
            'centro_comercial' => 'CERCA DE CENTRO COMERCIAL',
            'estufa' => 'ESTUFA',
            'marmol' => 'MARMOL',
            'parqueo' => 'PARQUEO',
            'seguridad_24_hrs' => 'SEGURIDAD 24 HRS',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Propiedad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPropiedad()
    {
        return $this->hasOne(Propiedades::className(), ['id' => 'propiedad_id']);
    }
}
