<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumni".
 *
 * @property int $id
 * @property string $title_crl
 * @property string $title_ru
 * @property string $text_crl
 * @property string $text_ru
 * @property string $images
 * @property int $status
 */
class Alumni extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumni';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_crl', 'title_ru', 'text_crl', 'text_ru', 'images'], 'required'],
            [['text_crl', 'text_ru'], 'string'],
            [['status'], 'integer'],
            [['title_crl', 'title_ru', 'images'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_crl' => 'Title Crl',
            'title_ru' => 'Title Ru',
            'text_crl' => 'Text Crl',
            'text_ru' => 'Text Ru',
            'images' => 'Images',
            'status' => 'Status',
        ];
    }
}
