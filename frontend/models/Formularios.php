<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "formularios".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $identificacion
 * @property string|null $direccion
 * @property string|null $ocupacion
 * @property string|null $correo
 * @property string|null $identificacion_url
 * @property string|null $certificado_titulo_url
 * @property int|null $pagado
 * @property int|null $procesado
 * @property string|null $transaction_id
 * @property string|null $date
 */
class Formularios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formularios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pagado', 'procesado'], 'integer'],
            [['date'], 'safe'],
            [['nombre', 'identificacion', 'direccion', 'ocupacion', 'correo', 'identificacion_url', 'certificado_titulo_url', 'transaction_id'], 'string', 'max' => 255],
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
            'identificacion' => 'Identificación',
            'direccion' => 'Dirección',
            'ocupacion' => 'Ocupación',
            'correo' => 'Correo',
            'identificacion_url' => 'Identificación',
            'certificado_titulo_url' => 'Certificado Titulo Url',
            'pagado' => 'Status',
            'procesado' => 'Procesado',
            'transaction_id' => 'No. Transacción',
            'date' => 'Fecha',
            'pago_total' => 'Monto a pagar',
        ];
    }
}
