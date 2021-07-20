<?php

use yii\db\Migration;

/**
 * Class m210719_225629_add_table_titulos
 */
class m210719_225629_add_table_titulos extends Migration
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

        $this->createTable('{{%titulos}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'imagen_url' => $this->string(),
            'descripcion' => $this->text(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210719_225629_add_table_titulos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210719_225629_add_table_titulos cannot be reverted.\n";

        return false;
    }
    */
}
