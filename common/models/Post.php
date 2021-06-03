<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $user_id
 * @property int $partner_id
 * @property string|null $body
 * @property string|null $date
 * @property int $status
 */
class Post extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'partner_id'], 'required'],
            [['user_id', 'partner_id', 'status'], 'integer'],
            [['body'], 'string'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'partner_id' => 'Partner ID',
            'body' => 'Body',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }
}
