<?php

namespace yuncms\tag\migrations;

use yii\db\Migration;

class M170204083513Add_backend_menu extends Migration
{
    public function up()
    {
        $this->batchInsert('{{%admin_menu}}', [ 'name', 'parent', 'route', 'icon', 'sort', 'data'], [
            ['Tag管理', 8, '/tag/index', 'fa-book', NULL, NULL],
        ]);

        $id = (new \yii\db\Query())->select(['id'])->from('{{%admin_menu}}')->where(['name' => 'Tag管理', 'parent' => 8,])->scalar($this->getDb());

        $this->batchInsert('{{%admin_menu}}', ['name', 'parent', 'route', 'visible', 'sort'], [
            ['创建Tag', $id, '/tag/create', 0, NULL],
            ['更新Tag', $id, '/tag/update', 0, NULL],
        ]);
    }

    public function down()
    {
        $id = (new \yii\db\Query())->select(['id'])->from('{{%admin_menu}}')->where(['name' => 'Tag管理', 'parent' => 8,])->scalar($this->getDb());
        $this->delete('{{%admin_menu}}', ['parent' => $id]);
        $this->delete('{{%admin_menu}}', ['id' => $id]);
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
