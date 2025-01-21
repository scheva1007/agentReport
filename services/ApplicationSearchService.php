<?php


namespace app\services;

use app\models\UserRecord;

class ApplicationSearchService
{
    /**
     * Пошук заявок з фільтрацією по датах
     *
     * @param string|null $resolvedAtFrom
     * @param string|null $resolvedAtTo
     * @return array
     */
    public function search($resolvedAtFrom = null, $resolvedAtTo = null): array
    {
        $query = UserRecord::find()
            ->select([
                'surname',
                'name',
                'disconnect_count' => 'SUM(IF(category = "Відключення", 1, 0))',
                'check_count' => 'SUM(IF(category = "Перевірка/здешевлення", 1, 0))',
                'technical_count' => 'SUM(IF(category = "Технічне питання", 1, 0))',
                'other_count' => 'SUM(IF(category = "Інше", 1, 0))',
                'total_count' => 'COUNT(applications.id)',
            ])
            ->leftJoin('applications', 'users.id = applications.user_id')
            ->where(['applications.status' => 'Вирішена']);

        if ($resolvedAtFrom) {
            $query->andWhere(['>=', 'applications.resolved_at', $resolvedAtFrom]);
        }
        if ($resolvedAtTo) {
            $resolvedAtTo = $resolvedAtTo . ' 23:59:59';
            $query->andWhere(['<=', 'applications.resolved_at', $resolvedAtTo]);
        }

        return $query->groupBy('users.id')->asArray()->all();
    }
}