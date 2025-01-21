<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "applications".
 *
 * @property int $id
 * @property int $user_id
 * @property string $Status
 * @property string $category
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $resolved_at
 *
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'Status', 'category'], 'required'],
            [['user_id'], 'integer'],
            [['Status', 'category'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['created_at', 'resolved_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'Status' => 'Status',
            'category' => 'Category',
            'description' => 'Description',
            'created_at' => 'Created At',
            'resolved_at' => 'Resolved At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserRecord::class, ['id' => 'user_id']);
    }
}
