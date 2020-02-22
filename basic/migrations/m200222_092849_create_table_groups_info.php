<?php

use yii\db\Migration;

/**
 * Class m200222_092849_create_table_groups_info
 */
class m200222_092849_create_table_groups_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('groups_info',[
            'group_id' => $this->primaryKey(11)->unsigned(),
            'group_name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('groups_info');
    }
}
