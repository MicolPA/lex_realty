<?php

use yii\db\Migration;

/**
 * Class m210722_003900_update_table_preconstruccion
 */
class m210722_003900_update_table_preconstruccion extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->alterColumn('{{%pre_construcciones}}', 'fecha_entrega', $this->date()->notNull()->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210722_003900_update_table_preconstruccion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210722_003900_update_table_preconstruccion cannot be reverted.\n";

        return false;
    }
    */
}
