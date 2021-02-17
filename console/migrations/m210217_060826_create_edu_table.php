<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%edu}}`.
 */
class m210217_060826_create_edu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%region}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string('255'),
        ]);
        $this->createTable('{{%edu}}', [
            'id' => $this->primaryKey(),
            'region_id' => $this->integer(),
            'name_uz' =>$this->string('255'),
            'name_ru' =>$this->string('255'),
            'status' =>$this->integer()->defaultValue(1),
        ]);
        $this->createIndex(
            'idx-edu-region_id',
            'edu',
            'region_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-edu-region_id',
            'edu',
            'region_id',
            'region',
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
            'fk-edu-region_id',
            'edu'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            'idx-edu-region_id',
            'edu'
        );

        $this->dropTable('{{%edu}}');
    }
}
