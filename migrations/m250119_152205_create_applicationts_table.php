<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%applicationts}}`.
 */
class m250119_152205_create_applicationts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%applications}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'Status' => "ENUM('Нова', 'В роботі', 'Вирішена') NOT NULL DEFAULT 'Нова'",
            'category' => "ENUM('Відключення', 'Перевірка/здешевлення', 'Технічне питання', 'Інше') NOT NULL",
            'description' => $this->text()->null(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'resolved_at' => $this->timestamp()->null(),
        ]);

        $this->addForeignKey(
            'fk-applications-user_id',
            '{{%applications}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-applications-user_id', '{{%applications}}');
        $this->dropTable('{{%applications}}');
    }
}
