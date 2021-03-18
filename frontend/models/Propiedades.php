<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "propiedades".
 *
 * @property int $id
 * @property string|null $titulo_publicacion
 * @property int|null $tipo_propiedad
 * @property int|null $ubicacion_id
 * @property int|null $habitaciones
 * @property int|null $baños
 * @property int|null $riezgo_id
 * @property int|null $impuestos
 * @property int|null $cargas_gramabes
 * @property int|null $deslinde
 * @property int|null $certificado_titulo
 * @property string|null $detalles
 * @property int|null $user_id
 * @property string|null $fecha_publicacion
 * @property string|null $foto_1
 * @property string|null $foto_2
 * @property string|null $foto_3
 * @property string|null $foto_4
 *
 * @property PropiedadesTipo $tipoPropiedad
 * @property Ubicaciones $ubicacion
 */
class Propiedades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propiedades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_propiedad', 'ubicacion_id', 'habitaciones', 'baños', 'riezgo_id', 'impuestos', 'cargas_gramabes', 'deslinde', 'certificado_titulo', 'user_id'], 'integer'],
            [['fecha_publicacion', 'precio', 'metros', 'pies', 'detalles'], 'safe'],
            [['titulo_publicacion'], 'string', 'max' => 255],
            [['tipo_propiedad'], 'exist', 'skipOnError' => true, 'targetClass' => PropiedadesTipo::className(), 'targetAttribute' => ['tipo_propiedad' => 'id']],
            [['ubicacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ubicaciones::className(), 'targetAttribute' => ['ubicacion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo_publicacion' => 'Titulo Publicacion',
            'tipo_propiedad' => 'Tipo Propiedad',
            'ubicacion_id' => 'Ubicacion ID',
            'habitaciones' => 'Habitaciones',
            'baños' => 'Baños',
            'riezgo_id' => 'Riezgo ID',
            'impuestos' => 'IMPUESTO AL DÍA',
            'cargas_gramabes' => 'LIBRES DE CARGAS GRABAMES',
            'deslinde' => 'DESLINDE',
            'certificado_titulo' => 'CERTIFICADO DE TITULO',
            'detalles' => 'Detalles',
            'user_id' => 'User ID',
            'fecha_publicacion' => 'Fecha Publicacion',
            // 'foto_1' => 'Foto 1',
            // 'foto_2' => 'Foto 2',
            // 'foto_3' => 'Foto 3',
            // 'foto_4' => 'Foto 4',
            'precio' => 'Precio',
        ];
    }

    /**
     * Gets query for [[TipoPropiedad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoPropiedad()
    {
        return $this->hasOne(PropiedadesTipo::className(), ['id' => 'tipo_propiedad']);
    }

    /**
     * Gets query for [[Ubicacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUbicacion()
    {
        return $this->hasOne(Ubicaciones::className(), ['id' => 'ubicacion_id']);
    }


    public function getGaleria()
    {
        return $this->hasOne(PropiedadesGaleria::className(), ['id' => 'galeria_id']);
    }
}
