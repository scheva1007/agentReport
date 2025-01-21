<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Search */
/* @var $reportData array */

?>

<h1>Звіт по агентам</h1>

<div class="search-form">
    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['index'],
    ]); ?>

    <?= $form->field($searchModel, 'resolved_at_from', [
        'labelOptions' => ['style' => 'font-weight: bold;'],
    ])->input('date') ?>
    <?= $form->field($searchModel, 'resolved_at_to', [
        'labelOptions' => ['style' => 'font-weight: bold;'],
    ])->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Пошук', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>ПIБ агента</th>
        <th>Відключення</th>
        <th>Перевірка/здешевлення</th>
        <th>Технічне питання</th>
        <th>Інше</th>
        <th>Усього</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($reportData as $row): ?>
        <tr>
            <td><?= Html::encode($row['surname'] .' '. $row['name']) ?></td>
            <td><?= $row['disconnect_count'] ?></td>
            <td><?= $row['check_count'] ?></td>
            <td><?= $row['technical_count'] ?></td>
            <td><?= $row['other_count'] ?></td>
            <td><?= $row['total_count'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>