<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_tag`.
 */
class m171027_164843_create_article_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article_tag', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer(),
            'tag_id' => $this->integer()
        ]);

        // creates index for column `article_id`

        $this->createIndex(
            'tag_article_article_id',
            'article_tag',
            'article_id'
        );

        // add foreigh key for table `article`

        $this->addForeignKey(
            'tag_article_article_id',
            'article_tag',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`

        $this->createIndex(
            'idx-tag_id',
            'article_tag',
            'tag_id'
        );

        // add foreigh key for table `user`
 
        $this->addForeignKey(
            'fk-tag_id',
            'article_tag',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article_tag');
    }
}
