<?php

use yii\db\Migration;

/**
 * Class m210609_015520_add_column
 */
class m210609_015520_add_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->alterColumn('{{%tasas_hipotecarias}}', 'tasa', $this->string()->defaultValue(null));

        $this->addColumn('{{%tasas_hipotecarias}}', 'tasa_2', $this->string()->defaultValue(null));
        $this->addColumn('{{%tasas_hipotecarias}}', 'tasa_3', $this->string()->defaultValue(null));


        $this->addColumn('{{%tasas_hipotecarias}}', 'duracion_2', $this->string()->defaultValue(null));
        $this->addColumn('{{%tasas_hipotecarias}}', 'duracion_3', $this->string()->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210609_015520_add_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210609_015520_add_column cannot be reverted.\n";

        return false;
    }
    */
}
