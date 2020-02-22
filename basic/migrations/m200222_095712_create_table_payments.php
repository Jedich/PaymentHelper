<?php

use yii\db\Migration;

/**
 * Class m200222_095712_create_table_payments
 */
class m200222_095712_create_table_payments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('payments', [
            'payment_id' => $this->primaryKey(11)->unsigned(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'cash' => $this->float(2)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('payments');
    }

}
