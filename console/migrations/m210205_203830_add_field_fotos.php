<?php

use yii\db\Migration;

/**
 * Class m210205_203830_add_field_fotos
 */
class m210205_203830_add_field_fotos extends Migration
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

        $this->createTable('{{%propiedades_galeria}}', [
            'id' => $this->primaryKey(),
            'foto_5' => $this->string(),
            'foto_6' => $this->string(),
            'foto_7' => $this->string(),
            'foto_8' => $this->string(),
            'foto_9' => $this->string(),
            'foto_10' => $this->string(),
            'foto_11' => $this->string(),
            'foto_12' => $this->string(),
        ], $tableOptions);

        $this->addColumn('{{%propiedades}}', 'galeria_id', $this->integer()->defaultValue(null));
        $this->addColumn('{{%propiedades}}', 'extra_fotos', $this->text()->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210205_203830_add_field_fotos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210205_203830_add_field_fotos cannot be reverted.\n";

        return false;
    }
    */
}
