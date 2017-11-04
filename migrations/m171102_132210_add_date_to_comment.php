<?php

use yii\db\Migration;

class m171102_132210_add_date_to_comment extends Migration
{
    public function Up()
    {
        $this->addColumn('comment', 'date', $this->date());
    }

    public function Down()
    {
        $this->dropColumn('comment', 'date');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171102_132210_add_date_to_comment cannot be reverted.\n";

        return false;
    }
    */
}
