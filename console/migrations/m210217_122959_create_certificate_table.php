<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%certificate}}`.
 */
class m210217_122959_create_certificate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%certificate}}', [
            'id' => $this->primaryKey(),
            'lname' =>$this->string('255'),
            'fname' =>$this->string('255'),
            'mname' =>$this->string('255'),
            'bdate' =>$this->string('255'),
            'psser' =>$this->string('255'),
            'phone' =>$this->string('255'),
            'special' =>$this->string('255'),
            'workplace' =>$this->string('255'),
            'psnum' =>$this->integer(),
            'imie' =>$this->integer(),
            'create_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%certificate}}');
    }
}
