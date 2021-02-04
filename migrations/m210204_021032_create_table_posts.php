<?php

use yii\db\Migration;

/**
 * Class m210204_021032_create_table_posts
 */
class m210204_021032_create_table_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%posts}}',
            [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer(),
                'title' => $this->string(100),
                'text' => $this->text()
            ]);

        $this->createIndex(
            'idx-posts-users_id',
            'posts',
            'user_id'
        );

        $this->addForeignKey(
            'fk-posts-users_id',
            'posts',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%posts}}');
    }

}
