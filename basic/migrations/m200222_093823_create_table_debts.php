<?php

use yii\db\Migration;

/**
 * Class m200222_093823_create_table_debts
 */
class m200222_093823_create_table_debts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
    	$this->createTable("debt_info", [
    		'group_id' => $this->integer(11)->unsigned()->notNull(),
			'user1_id' => $this->integer(11)->unsigned()->notNull(),
			'user2_id' => $this->integer(11)->unsigned()->notNull(),
			'sum' => $this->float(2)->unsigned()->notNull()
		]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable("debt_info");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200222_093823_create_table_debts cannot be reverted.\n";

        return false;
    }
    */
}
