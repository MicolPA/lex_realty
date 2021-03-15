<?php

use yii\db\Migration;

/**
 * Class m210315_034437_add_new_field_description_users
 */
class m210315_034437_add_new_field_description_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'descripcion', $this->text()->defaultValue(null));
        $this->addColumn('{{%propiedades_extras}}', 'propiedad', $this->integer()->defaultValue(1));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210315_034437_add_new_field_description_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210315_034437_add_new_field_description_users cannot be reverted.\n";

        return false;
    }
    */
}
