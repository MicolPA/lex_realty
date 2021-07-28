<?php

use yii\db\Migration;

/**
 * Class m210728_023925_add_new_rating
 */
class m210728_023925_add_new_rating extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%stars_rating_count}}', 'seguimiento_construccion', $this->float()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210728_023925_add_new_rating cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210728_023925_add_new_rating cannot be reverted.\n";

        return false;
    }
    */
}
