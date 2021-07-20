<?php

use yii\db\Migration;

/**
 * Class m210720_190635_tables_rating
 */
class m210720_190635_tables_rating extends Migration
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

        // $this->createTable('{{%stars_rating_category}}', [
        //     'id' => $this->primaryKey(),
        //     'name' => $this->string(),
        // ], $tableOptions);

        $this->createTable('{{%stars_rating_count}}', [
            'id' => $this->primaryKey(),
            'desarrollador_id' => $this->integer(),
            'fecha_entrega' => $this->float()->defaultValue(0),
            'calidad_materiales' => $this->float()->defaultValue(0),
            'entrega_areas_sociales' => $this->float()->defaultValue(0),
            'entrega_design' => $this->float()->defaultValue(0),
            'stars_count' => $this->float(),
            'email' => $this->string(),
            'date' => $this->dateTime(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210720_190635_tables_rating cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210720_190635_tables_rating cannot be reverted.\n";

        return false;
    }
    */
}
