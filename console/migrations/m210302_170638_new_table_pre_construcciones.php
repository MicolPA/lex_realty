<?php

use yii\db\Migration;

/**
 * Class m210302_170638_new_table_pre_construcciones
 */
class m210302_170638_new_table_pre_construcciones extends Migration
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

        $this->createTable('{{%pre_construcciones}}', [
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
            'permisos_municipales' => $this->integer(),
            'permiso_ambiental' => $this->integer(),
            'objeccion_ministerio_turismo' => $this->integer(),
            'permiso_obras_publicas' => $this->integer(),
            'confortur' => $this->integer(),
            'celular_contacto' => $this->string(),
            'detalles' => $this->string(),
            'precio' => $this->integer(),
            'galeria_id' => $this->integer(),
            'user_id' => $this->integer(),
            'pies' => $this->float(),
            'metros' => $this->float(),
            'fecha_publicacion' => $this->dateTime(),
            'foto_1' => $this->string(),
            'foto_2' => $this->string(),
            'foto_3' => $this->string(),
            'foto_4' => $this->string(),
        ], $tableOptions);

        $this->addColumn('{{%propiedades_galeria}}', 'propiedades', $this->string()->defaultValue(1));
        $this->addColumn('{{%user}}', 'photo_url', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'celular', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'email', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'inmobiliaria', $this->string()->defaultValue(null));
        $this->addColumn('{{%ubicaciones}}', 'portada', $this->string()->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210302_170638_new_table_pre_construcciones cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210302_170638_new_table_pre_construcciones cannot be reverted.\n";

        return false;
    }
    */
}
