<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transaction_details".
 *
 * @property int $id
 * @property string|null $state
 * @property string|null $payer_first_name
 * @property string|null $payer_last_name
 * @property string|null $payer_id
 * @property string|null $payer_email
 * @property string|null $country_code
 * @property string|null $invoice_number
 * @property int|null $amount
 * @property string|null $token
 * @property int|null $procesado
 * @property string|null $date
 */
class TransactionDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'procesado'], 'integer'],
            [['date'], 'safe'],
            [['state', 'payer_first_name', 'payer_last_name', 'payer_id', 'payer_email', 'country_code', 'invoice_number', 'token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state' => 'State',
            'payer_first_name' => 'Nombre',
            'payer_last_name' => 'Apellido',
            'payer_id' => 'ID Comprador',
            'payer_email' => 'Correo',
            'country_code' => 'Codigo del pais',
            'invoice_number' => 'No. Transacción',
            'amount' => 'Total',
            'token' => 'Token',
            'procesado' => 'Procesado',
            'date' => 'Date',
        ];
    }
}
