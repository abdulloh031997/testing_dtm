<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role}}`.
 */
class m210216_105830_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'name' =>$this->string('255'),
        ]);
        $this->addColumn('user','role_id', $this->integer());
        $this->createIndex(
            'idx-user-role_id',
            'user',
            'role_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user-role_id',
            'user',
            'role_id',
            'role',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-user-role_id',
            'user'
        );

        // drops index for column `role_id`
        $this->dropIndex(
            'idx-user-role_id',
            'user'
        );
        $this->dropTable('{{%role}}');
    }
}
