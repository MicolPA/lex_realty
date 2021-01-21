<?php

use yii\db\Migration;

/**
 * Class m210120_001950_add_new_field_meters
 */
class m210120_001950_add_new_field_meters extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%propiedades}}', 'metros', $this->float()->defaultValue(null));
        $this->addColumn('{{%propiedades}}', 'pies', $this->float()->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210120_001950_add_new_field_meters cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210120_001950_add_new_field_meters cannot be reverted.\n";

        return false;
    }
    */
}
