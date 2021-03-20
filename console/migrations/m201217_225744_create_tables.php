<?php

use yii\db\Migration;

/**
 * Class m201217_225744_create_tables
 */
class m201217_225744_create_tables extends Migration
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

        $this->createTable('{{%propiedades}}', [
            'id' => $this->primaryKey(),
            'titulo_publicacion' => $this->string(),
            'tipo_propiedad' => $this->integer(),
            'ubicacion_id' => $this->integer(),
            'habitaciones' => $this->integer(),
            'baños' => $this->integer(),
            'riezgo_id' => $this->integer(),
            'impuestos' => $this->integer(),
            'cargas_gramabes' => $this->integer(),
            'deslinde' => $this->integer(),
            'certificado_titulo' => $this->integer(),
            'detalles' => $this->text(),
            'user_id' => $this->integer(),
            'fecha_publicacion' => $this->dateTime(),
            'foto_1' => $this->string(),
            'foto_2' => $this->string(),
            'foto_3' => $this->string(),
            'foto_4' => $this->string(),
        ], $tableOptions);

        $this->createTable('{{%propiedades_tipo}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
        ], $tableOptions);

        $this->createTable('{{%ubicaciones}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
        ], $tableOptions);

        $this->addForeignKey('tipo', '{{%propiedades}}', 'tipo_propiedad', '{{%propiedades_tipo}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('ubicacion', '{{%propiedades}}', 'ubicacion_id', '{{%ubicaciones}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201217_225744_create_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201217_225744_create_tables cannot be reverted.\n";

        return false;
    }
    */
}
