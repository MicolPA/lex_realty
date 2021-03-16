<?php

use yii\db\Migration;

/**
 * Class m210316_161532_add_table_hipotecarios
 */
class m210316_161532_add_table_hipotecarios extends Migration
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

        $this->createTable('{{%tasas_hipotecarias}}', [
            'id' => $this->primaryKey(),
            'nombre_banco' => $this->string(),
            'photo_url' => $this->string(),
            'tasa' => $this->float(),
            'duracion' => $this->string(),
            'correo' => $this->string(),
            'telefono' => $this->string(),
            'date' => $this->dateTime(),
        ], $tableOptions);

        $this->createTable('{{%anuncios}}', [
            'id' => $this->primaryKey(),
            'photo_url' => $this->string(),
            'lugar' => $this->string(),
            'date' => $this->dateTime(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210316_161532_add_table_hipotecarios cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210316_161532_add_table_hipotecarios cannot be reverted.\n";

        return false;
    }
    */
}
