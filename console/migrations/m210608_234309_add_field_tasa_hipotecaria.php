<?php

use yii\db\Migration;

/**
 * Class m210608_234309_add_field_tasa_hipotecaria
 */
class m210608_234309_add_field_tasa_hipotecaria extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        // $this->alterColumn('{{%tasas_hipotecarias}}', 'tasa', $this->string()->defaultValue(null));

        // $this->addColumn('{{%tasas_hipotecarias}}', 'tasa_2', $this->string()->defaultValue(null));
        // $this->addColumn('{{%tasas_hipotecarias}}', 'tasa_3', $this->string()->defaultValue(null));


        // $this->addColumn('{{%tasas_hipotecarias}}', 'duracion_2', $this->string()->defaultValue(null));
        // $this->addColumn('{{%tasas_hipotecarias}}', 'duracion_3', $this->string()->defaultValue(null));

        $this->addColumn('{{%tasas_hipotecarias}}', 'tipo', $this->string()->defaultValue(null));
        $this->addColumn('{{%tasas_hipotecarias}}', 'tipo_2', $this->string()->defaultValue(null));
        $this->addColumn('{{%tasas_hipotecarias}}', 'tipo_3', $this->string()->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210608_234309_add_field_tasa_hipotecaria cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210608_234309_add_field_tasa_hipotecaria cannot be reverted.\n";

        return false;
    }
    */
}
