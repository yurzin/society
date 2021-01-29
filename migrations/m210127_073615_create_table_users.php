<?php

use yii\db\Migration;

/**
 * Class m210127_073615_create_table_users
 */
class m210127_073615_create_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%users}}',
            [
                'id' => $this->primaryKey(),
                'photo' => $this->string(100),
                'date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
                'name' => $this->string(100),
                'last_name' => $this->string(100),
                'patronymic' => $this->string(100),
                'birth_date' => $this->date(),
                'gender' => $this->string(100),
                'city' => $this->string(100),
                'email' => $this->string(100),
                'phone' => $this->string(100),
                'about' => $this->text()
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210127_073615_create_table_users cannot be reverted.\n";

        return false;
    }
    */
}
