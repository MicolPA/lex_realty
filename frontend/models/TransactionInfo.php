<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transaction_info".
 *
 * @property int $id
 * @property string|null $payment_id
 * @property string|null $token
 * @property string|null $payer_id
 * @property string|null $date
 */
class TransactionInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['payment_id', 'token', 'payer_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_id' => 'Payment ID',
            'token' => 'Token',
            'payer_id' => 'Payer ID',
            'date' => 'Date',
        ];
    }
}
