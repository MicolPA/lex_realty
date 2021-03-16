<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "anuncios".
 *
 * @property int $id
 * @property string|null $photo_url
 * @property string|null $lugar
 * @property string|null $date
 */
class Anuncios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anuncios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['photo_url', 'lugar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo_url' => 'Photo Url',
            'lugar' => 'Lugar',
            'date' => 'Date',
        ];
    }
}
