<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $auth_key
 * @property int $role_id
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property string $descripcion
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property string|null $photo_url
 * @property string|null $celular
 * @property string|null $inmobiliaria
 *
 * @property Roles $role
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['role_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'first_name', 'last_name', 'password_hash', 'password_reset_token', 'email', 'verification_token', 'photo_url', 'celular', 'inmobiliaria'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['descripcion'], 'safe'],
            [['password_reset_token'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'USUARIO',
            'first_name' => 'NOMBRE',
            'last_name' => 'APELLIDO',
            'auth_key' => 'Auth Key',
            'descripcion' => 'DESCRIPCIÓN',
            'role_id' => 'Role ID',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'photo_url' => 'Photo Url',
            'celular' => 'Celular',
            'inmobiliaria' => 'INMOBILIARIA',
        ];
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::className(), ['id' => 'role_id']);
    }
}
