<?php

use yii\db\Migration;

/**
 * Class m210317_214841_add_new_table_posts
 */
class m210317_214841_add_new_table_posts extends Migration
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

        $this->createTable('{{%entradas}}', [
            'id' => $this->primaryKey(),
            'titulo' => $this->string(),
            'url' => $this->string(),
            'photo_url' => $this->string(),
            'fecha_publicacion' => $this->date(),
            'date' => $this->dateTime(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210317_214841_add_new_table_posts cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210317_214841_add_new_table_posts cannot be reverted.\n";

        return false;
    }
    */
}
