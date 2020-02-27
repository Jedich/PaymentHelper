<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "debt_info".
 *
 * @property int $group_id
 * @property int $user1_id
 * @property int $user2_id
 * @property float $sum
 *
 * @property GroupsInfo $group
 * @property UserInfo $user1
 * @property UserInfo $user2
 */
class DebtInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'debt_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'user1_id', 'user2_id', 'sum'], 'required'],
            [['group_id', 'user1_id', 'user2_id'], 'integer'],
            [['sum'], 'number'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => GroupsInfo::className(), 'targetAttribute' => ['group_id' => 'group_id']],
            [['user1_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserInfo::className(), 'targetAttribute' => ['user1_id' => 'id']],
            [['user2_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserInfo::className(), 'targetAttribute' => ['user2_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'user1_id' => 'User1 ID',
            'user2_id' => 'User2 ID',
            'sum' => 'Sum',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(GroupsInfo::className(), ['group_id' => 'group_id']);
    }

    /**
     * Gets query for [[User1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser1()
    {
        return $this->hasOne(UserInfo::className(), ['id' => 'user1_id']);
    }

    /**
     * Gets query for [[User2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser2()
    {
        return $this->hasOne(UserInfo::className(), ['id' => 'user2_id']);
    }
}
