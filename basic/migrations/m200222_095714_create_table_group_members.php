<?php

use yii\db\Migration;

/**
 * Class m200222_095714_create_table_group_members
 */
class m200222_095714_create_table_group_members extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
    	$this->createTable("group_members", [
    		'group_id' => $this->integer(11)->unsigned()->notNull(),
			'user_id' => $this->integer(11)->unsigned()->notNull()
		]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    	$this->dropTable("group_members");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200222_095714_create_table_group_members cannot be reverted.\n";

        return false;
    }
    */
}
