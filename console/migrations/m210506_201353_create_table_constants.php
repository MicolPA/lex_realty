<?php

use yii\db\Migration;

/**
 * Class m210506_201353_create_table_constants
 */
class m210506_201353_create_table_constants extends Migration
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

        $this->createTable('{{%constantes}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'contenido' => $this->text(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210506_201353_create_table_constants cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210506_201353_create_table_constants cannot be reverted.\n";

        return false;
    }
    */
}
