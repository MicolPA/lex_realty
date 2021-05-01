<?php

use yii\db\Migration;

/**
 * Class m210430_025009_add_new_desarrolladores
 */
class m210430_025009_add_new_desarrolladores extends Migration
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

        $this->createTable('{{%desarrolladores}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'portada' => $this->string(),
            'logo' => $this->string(),
            'date' => $this->dateTime(),
        ], $tableOptions);

        $this->createTable('{{%proyectos}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'ubicacion_id' => $this->integer(),
            'descripcion' => $this->text(),
            'foto_1' => $this->string(),
            'foto_2' => $this->string(),
            'foto_3' => $this->string(),
            'foto_4' => $this->string(),
            'foto_5' => $this->string(),
            'foto_6' => $this->string(),
            'foto_7' => $this->string(),
            'foto_8' => $this->string(),
            'desarrollador_id' => $this->integer(),
            'date' => $this->dateTime(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210430_025009_add_new_desarrolladores cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210430_025009_add_new_desarrolladores cannot be reverted.\n";

        return false;
    }
    */
}
