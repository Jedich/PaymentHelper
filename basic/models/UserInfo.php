<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $password
 *
 * @property DebtInfo[] $debtInfos
 * @property DebtInfo[] $debtInfos0
 * @property GroupMembers[] $groupMembers
 * @property Payments[] $payments
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'password'], 'required'],
            [['name', 'password'], 'string', 'max' => 128],
            [['phone'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[DebtInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDebtInfos()
    {
        return $this->hasMany(DebtInfo::className(), ['user1_id' => 'id']);
    }

    /**
     * Gets query for [[DebtInfos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDebtInfos0()
    {
        return $this->hasMany(DebtInfo::className(), ['user2_id' => 'id']);
    }

    /**
     * Gets query for [[GroupMembers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupMembers()
    {
        return $this->hasMany(GroupMembers::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['user_id' => 'id']);
    }
}
