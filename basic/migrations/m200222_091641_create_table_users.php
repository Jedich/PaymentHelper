<?php

use yii\db\Migration;

/**
 * Class m200222_091641_create_table_users
 */
class m200222_091641_create_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
    	$this->createTable("user_info",[
    		'id' => $this->primaryKey(11)->unsigned(),
			'name' => $this->string(128)->notNull(),
			'phone' => $this->string(32)->notNull(),
			'password' => $this->string(128)->notNull()
		]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable("user_info");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200222_091641_create_table_users cannot be reverted.\n";

        return false;
    }
    */
}
