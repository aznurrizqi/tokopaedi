<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $id
 * @property string $role_name
 * @property string $description
 *
 * @property User[] $users
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_name', 'description'], 'required'],
            [['description'], 'string'],
            [['role_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_name' => 'Role Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['role_id' => 'id']);
    }
}
