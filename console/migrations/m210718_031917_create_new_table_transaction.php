<?php

use yii\db\Migration;

/**
 * Class m210718_031917_create_new_table_transaction
 */
class m210718_031917_create_new_table_transaction extends Migration
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

        $this->createTable('{{%transaction_info}}', [
            'id' => $this->primaryKey(),
            'payment_id' => $this->string(),
            'token' => $this->string(),
            'payer_id' => $this->string(),
            'state' => $this->integer(),
            'date' => $this->dateTime(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210718_031917_create_new_table_transaction cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210718_031917_create_new_table_transaction cannot be reverted.\n";

        return false;
    }
    */
}
