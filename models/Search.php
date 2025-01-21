<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class Search extends Application
{
    public $resolved_at_from;
    public $resolved_at_to;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resolved_at_from', 'resolved_at_to'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'resolved_at_from' => 'Дата вирішення з :',
            'resolved_at_to' => 'Дата вирішення по :',
        ];
    }

    /**
     * Пошукова функція
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Application::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        if ($this->resolved_at_from) {
            $query->andWhere(['>=', 'resolved_at', $this->resolved_at_from]);
        }

        if ($this->resolved_at_to) {
            $query->andWhere(['<=', 'resolved_at', $this->resolved_at_to]);
        }

        return $dataProvider;
    }
}