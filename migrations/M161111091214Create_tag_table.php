<?php

namespace yuncms\tag\migrations;

use yii\db\Migration;

class M161111091214Create_tag_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->unique(),
            'title' => $this->string(),
            'keywords' => $this->string(),
            'description' => $this->text(),
            'slug' => $this->string(),
            'letter' => $this->string(1),
            'frequency' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);


    }

    public function down()
    {
        $this->dropTable('{{%tag}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
