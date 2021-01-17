<?php

use yii\db\Migration;

/**
 * Class m210116_220434_add_alto_riesgo
 */
class m210116_220434_add_alto_riesgo extends Migration
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

        $this->createTable('{{%propiedades_riesgo}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'color' => $this->string(),
        ], $tableOptions);

        $this->addColumn('{{%propiedades}}', 'precio', $this->integer()->defaultValue(null));

        $this->createTable('{{%propiedades_extras}}', [
            'id' => $this->primaryKey(),
            'propiedad_id' => $this->integer(),
            'aire_acondicionado' => $this->integer(),
            'balcon' => $this->integer(),
            'cocina' => $this->integer(),
            'lavadora' => $this->integer(),
            'nevera' => $this->integer(),
            'piscina' => $this->integer(),
            'vista_campo_golf' => $this->integer(),
            'amueblado' => $this->integer(),
            'centro_comercial' => $this->integer(),
            'estufa' => $this->integer(),
            'marmol' => $this->integer(),
            'parqueo' => $this->integer(),
            'seguridad_24_hrs' => $this->integer(),
            'date' => $this->dateTime(),
        ], $tableOptions);

        $this->addForeignKey('extra', '{{%propiedades_extras}}', 'propiedad_id', '{{%propiedades}}', 'id', 'CASCADE', 'CASCADE');

        


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210116_220434_add_alto_riesgo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210116_220434_add_alto_riesgo cannot be reverted.\n";

        return false;
    }
    */
}
