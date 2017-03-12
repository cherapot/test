<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m170311_154403_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'post' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'status' => $this->boolean()->defaultValue(true),            
            'isDeleted' => $this->boolean()->defaultValue(false),            
        ]);

        for ($i = 1; $i <= 10; ++$i) {
             $this->insert('posts', [
                'title' => 'Заголовок '.$i,
                'post' => 'Какой-то пост',
                'created_at' => time(),
                'updated_at' => time(),   
            ]);        
        }
       
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('posts');
    }
}
