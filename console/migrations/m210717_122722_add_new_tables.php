<?php

use yii\db\Migration;

/**
 * Class m210717_122722_add_new_tables
 */
class m210717_122722_add_new_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%formularios}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'identificacion' => $this->string(),
            'direccion' => $this->string(),
            'ocupacion' => $this->string(),
            'correo' => $this->string(),
            'identificacion_url' => $this->string(),
            'certificado_titulo_url' => $this->string(),
            'pagado' => $this->integer()->defaultValue(null),
            'pago_total' => $this->string()->defaultValue(null),
            'procesado' => $this->integer()->defaultValue(0),
            'email_notification' => $this->integer()->defaultValue(0),
            'transaction_id' => $this->string(),
            'pdf_url' => $this->string(),
            'date' => $this->dateTime(),
        ], $tableOptions);


        $this->createTable('{{%transaction_details}}', [
            'id' => $this->primaryKey(),
            'state' => $this->string(),
            'payer_first_name' => $this->string(),
            'payer_last_name' => $this->string(),
            'payer_id' => $this->string(),
            'payer_email' => $this->string(),
            'country_code' => $this->string(),
            'invoice_number' => $this->string(),
            'amount' => $this->integer()->defaultValue(null),
            'token' => $this->string(),
            'procesado' => $this->integer()->defaultValue(0),
            'date' => $this->dateTime(),
        ], $tableOptions);

        $this->addColumn('{{%pre_construcciones}}', 'desarrollador_id', $this->integer()->defaultValue(1));
        $this->addColumn('{{%pre_construcciones}}', 'fecha_entrega', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210717_122722_add_new_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210717_122722_add_new_tables cannot be reverted.\n";

        return false;
    }
    */
}
