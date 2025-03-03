<?php

use yii\db\Migration;

/**
 * Class m250121_150413_seed_users_and_applications
 */
class m250121_150413_seed_users_and_applications extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('users', ['surname', 'name', 'middle_name', 'created_at'], [
            ['Іванов', 'Іван', 'Іванович', '2025-01-01 12:00:00'],
            ['Петров', 'Петро', 'Петрович', '2025-01-02 12:00:00'],
            ['Сидоров', 'Сидір', 'Сидорович', '2025-01-03 12:00:00'],
            ['Мельник', 'Олександр', 'Анатолійович', '2025-01-04 12:00:00'],
            ['Коваленко', 'Василь', 'Іванович', '2025-01-05 12:00:00'],
            ['Дьяков', 'Юрій', 'Вікторович', '2025-01-06 12:00:00'],
            ['Черненко', 'Наталія', 'Володимирівна', '2025-01-07 12:00:00'],
        ]);

        $this->batchInsert('applications', ['user_id', 'status', 'category', 'description', 'created_at', 'resolved_at'], [
            [1, 'Нова', 'Технічне питання', 'Опис проблеми 1', '2025-01-10 10:20:00', '2025-01-10 12:30:00'],
            [2, 'В роботі', 'Перевірка/здешевлення', 'Опис проблеми 2', '2025-01-05 09:10:00', '2025-01-06 10:50:00'],
            [3, 'Вирішена', 'Відключення', 'Опис проблеми 3', '2025-01-02 15:20:00', '2025-01-03 11:00:00'],
            [4, 'Вирішена', 'Інше', 'Опис проблеми 4', '2025-01-08 10:10:00', '2025-01-09 12:50:00'],
            [5, 'Нова', 'Технічне питання', 'Опис проблеми 5', '2025-01-08 11:00:00', '2025-01-10 09:10:00'],
            [6, 'Вирішена', 'Перевірка/здешевлення', 'Опис проблеми 6', '2025-01-15 10:20:00', '2025-01-15 15:00:00'],
            [7, 'Вирішена', 'Відключення', 'Опис проблеми 7', '2025-01-14 09:20:00', '2025-01-14 14:10:00'],
            [1, 'Нова', 'Інше', 'Опис проблеми 8', '2025-01-10 10:20:00', '2025-01-11 10:50:00'],
            [2, 'В роботі', 'Технічне питання', 'Опис проблеми 9', '2025-01-04 13:00:00', '2025-01-05 10:00:00'],
            [3, 'Вирішена', 'Перевірка/здешевлення', 'Опис проблеми 10', '2025-01-10 09:10:00', '2025-01-10 13:3:00'],
            [4, 'Вирішена', 'Відключення', 'Опис проблеми 11', '2025-01-15 09:20:00', '2025-01-15 14:40:00'],
            [5, 'Нова', 'Інше', 'Опис проблеми 12', '2025-01-12 10:00:00', '2025-01-12 13:00:00'],
            [6, 'В роботі', 'Технічне питання', 'Опис проблеми 13', '2025-01-02 10:00:00', '2025-01-02 11:30:00'],
            [7, 'Вирішена', 'Перевірка/здешевлення', 'Опис проблеми 14', '2025-01-16 11:00:00', '2025-01-17 10:00:00'],
            [1, 'В роботі', 'Відключення', 'Опис проблеми 15', '2024-12-23 12:30:00', '2024-12-24 15:00:00'],
            [2, 'Вирішена', 'Інше', 'Опис проблеми 16', '2024-12-15 15:00:00', '2024-12-16 09:00:00'],
            [3, 'Вирішена', 'Технічне питання', 'Опис проблеми 17', '2024-12-10 14:00:00', '2024-12-11 16:00:00'],
            [4, 'В роботі', 'Перевірка/здешевлення', 'Опис проблеми 18', '2024-12-18 11:00:00', '2024-12-18 14:00:00'],
            [5, 'Нова', 'Відключення', 'Опис проблеми 19', '2024-12-23 09:00:00', '2024-12-26 12:30:00'],
            [6, 'Вирішена', 'Інше', 'Опис проблеми 20', '2024-11-17 10:10:00', '2024-11-18 15:30:00'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('users');
        $this->truncateTable('applications');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250121_150413_seed_users_and_applications cannot be reverted.\n";

        return false;
    }
    */
}
