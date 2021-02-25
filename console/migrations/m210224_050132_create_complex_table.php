<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%complex}}`.
 */
class m210224_050132_create_complex_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%complex}}', [
            'id' => $this->primaryKey(),
            'region_id' =>$this->text(),
            'edu_id' =>$this->integer(),
            'education_id' =>$this->integer(),
        ]);
        $this->createTable('{{%complex_fans}}', [
            'id' => $this->primaryKey(),
            'fan_id' => $this->text(),
            'ball' => $this->integer(),
            'block_order' =>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%complex}}');
    }
}
