<?php

use yii\db\Migration;

/**
 * Class m200222_102852_create_FK
 */
class m200222_102852_create_FK extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // group members FK

        $this->addForeignKey('fk_users_members',
        'group_members',
        'user_id',
        'user_info',
        'id',
        'CASCADE',
        'CASCADE'
        );
        $this->addForeignKey('fk_groups_members',
        'group_members',
        'group_id',
        'groups_info',
        'group_id',
        'CASCADE',
        'CASCADE'
    );

        // payments FK

        $this->addForeignKey('fk_user_payments',
            'payments',
            'user_id',
            'user_info',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey('fk_groups_payments',
            'payments',
            'group_id',
            'groups_info',
            'group_id',
            'CASCADE',
            'CASCADE'
        );


        // debts FK

        $this->addForeignKey('fk_group_debt',
            'debt_info',
            'group_id',
            'groups_info',
            'group_id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey('fk_user1_debt',
        'debt_info',
        'user1_id',
        'user_info',
        'id',
        'CASCADE',
        'CASCADE'
    );
        $this->addForeignKey('fk_user2_debt',
            'debt_info',
            'user2_id',
            'user_info',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropForeignKey('fk_users_members', 'group_members');
       $this->dropForeignKey('fk_groups_members', 'group_members');

        $this->dropForeignKey('fk_user_payments', 'payments');
        $this->dropForeignKey('fk_groups_payments', 'payments');

        $this->dropForeignKey('fk_group_debt', 'debt_info');
        $this->dropForeignKey('fk_user1_debt', 'debt_info');
        $this->dropForeignKey('fk_user2_debt', 'debt_info');


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200222_102852_create_FK cannot be reverted.\n";

        return false;
    }
    */
}
