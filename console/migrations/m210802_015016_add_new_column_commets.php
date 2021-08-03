<?php

use yii\db\Migration;

/**
 * Class m210802_015016_add_new_column_commets
 */
class m210802_015016_add_new_column_commets extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%stars_rating_count}}', 'comment', $this->text()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210802_015016_add_new_column_commets cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210802_015016_add_new_column_commets cannot be reverted.\n";

        return false;
    }
    */
}
