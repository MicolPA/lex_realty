<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pre_construcciones".
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
 * @property int|null $permisos_municipales
 * @property int|null $permiso_ambiental
 * @property int|null $objeccion_ministerio_turismo
 * @property int|null $permiso_obras_publicas
 * @property int|null $confortur
 * @property string|null $celular_contacto
 * @property string|null $detalles
 * @property int|null $precio
 * @property int|null $user_id
 * @property string|null $fecha_publicacion
 * @property string|null $foto_1
 * @property string|null $foto_2
 * @property string|null $foto_3
 * @property string|null $foto_4
 */
class PreConstrucciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pre_construcciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_propiedad', 'ubicacion_id', 'habitaciones', 'baños', 'riezgo_id', 'impuestos', 'cargas_gramabes', 'deslinde', 'certificado_titulo', 'permisos_municipales', 'permiso_ambiental', 'objeccion_ministerio_turismo', 'permiso_obras_publicas', 'confortur', 'precio', 'user_id'], 'integer'],
            [['fecha_publicacion', 'metros', 'pies'], 'safe'],
            [['titulo_publicacion', 'celular_contacto', 'detalles', 'foto_1', 'foto_2', 'foto_3', 'foto_4'], 'string', 'max' => 255],
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
            'cargas_gramabes' => 'LIBRES DE CARGAS Y GRAVÁMENES',
            'deslinde' => 'DESLINDE',
            'certificado_titulo' => 'CERTIFICADO DE TITULO',
            'permisos_municipales' => 'PERMISOS MUNICIPALES',
            'permiso_ambiental' => 'PERMISO AMBIENTAL',
            'objeccion_ministerio_turismo' => 'NO OBJECIÓN DEL MINISTERIO DE TURISMO',
            'permiso_obras_publicas' => 'PERMISO DE OBRAS PUBLICAS',
            'confortur' => 'CONFORTUR',
            'celular_contacto' => 'Celular Contacto',
            'detalles' => 'Detalles',
            'precio' => 'Precio',
            'metros' => 'Metros',
            'pies' => 'Pies',
            'user_id' => 'User ID',
            'fecha_publicacion' => 'Fecha Publicacion',
            'foto_1' => 'Foto 1',
            'foto_2' => 'Foto 2',
            'foto_3' => 'Foto 3',
            'foto_4' => 'Foto 4',
        ];
    }

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
