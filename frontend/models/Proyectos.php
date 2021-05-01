<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "proyectos".
 *
 * @property int $id
 * @property string|null $nombre
 * @property int|null $ubicacion_id
 * @property string|null $descripcion
 * @property string|null $foto_1
 * @property string|null $foto_2
 * @property string|null $foto_3
 * @property string|null $foto_4
 * @property string|null $foto_5
 * @property string|null $foto_6
 * @property string|null $foto_7
 * @property string|null $foto_8
 * @property int|null $desarrollador_id
 * @property string|null $date
 */
class Proyectos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyectos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ubicacion_id', 'desarrollador_id'], 'integer'],
            [['descripcion'], 'string'],
            [['date'], 'safe'],
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
            'ubicacion_id' => 'Ubicacion ID',
            'descripcion' => 'Descripcion',
            'foto_1' => 'Foto 1',
            'foto_2' => 'Foto 2',
            'foto_3' => 'Foto 3',
            'foto_4' => 'Foto 4',
            'foto_5' => 'Foto 5',
            'foto_6' => 'Foto 6',
            'foto_7' => 'Foto 7',
            'foto_8' => 'Foto 8',
            'desarrollador_id' => 'Desarrollador ID',
            'date' => 'Date',
        ];
    }

    public function getUbicacion()
    {
        return $this->hasOne(Ubicaciones::className(), ['id' => 'ubicacion_id']);
    }
    public function getDesarrollador()
    {
        return $this->hasOne(Desarrolladores::className(), ['id' => 'desarrollador_id']);
    }
}
