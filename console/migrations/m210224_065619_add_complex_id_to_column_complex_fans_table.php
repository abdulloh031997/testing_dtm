<?php

use yii\db\Migration;

/**
 * Class m210224_065619_add_complex_id_to_column_complex_fans_table
 */
class m210224_065619_add_complex_id_to_column_complex_fans_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('complex_fans', 'complex_id', $this->integer());
        // creates index for column `complex_id`
        $this->createIndex(
            'idx-complex_fans-complex_id',
            'complex_fans',
            'complex_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-complex_fans-complex_id',
            'complex_fans',
            'complex_id',
            'complex',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m210224_065619_add_complex_id_to_column_complex_fans_table cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210224_065619_add_complex_id_to_column_complex_fans_table cannot be reverted.\n";

        return false;
    }
    */
}
