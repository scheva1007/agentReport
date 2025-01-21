<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string|null $middle_name
 * @property string|null $created_at
 *
 * @property Application[] $applications
 */
class UserRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name'], 'required'],
            [['created_at'], 'safe'],
            [['surname', 'name', 'middle_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Surname',
            'name' => 'Name',
            'middle_name' => 'Middle Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['user_id' => 'id']);
    }
}
